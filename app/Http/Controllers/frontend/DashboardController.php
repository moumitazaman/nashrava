<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Model\Payment;
use App\Model\Category;
use App\Model\Brand;
use Auth;
use App\Model\Shipping;
use App\Model\Product;
use DB;
use App\Model\Order;
use App\Model\OrderDetail;
use Cart;
use App\User;
class DashboardController extends Controller
{

    public function dashboard(){

         return view('frontend.single_page.customer.customer-dashboard',[

      'categories' => Category::orderBy('id','desc')->get(),
			'brands' => Brand::orderBy('id','desc')->get(),
			'products' => Product::orderBy('id','desc')->get(),
			'user' => Auth::user(),


         ]);
    }


    public function payment(){

         return view('frontend.single_page.customer.customer-payment',[
                'categories' => Category::orderBy('id','desc')->get(),
				'brands' => Brand::orderBy('id','desc')->get(),
				'products' => Product::orderBy('id','desc')->get(),
								              'order' => Order::where('user_id',Auth::user()->id)->count(),


         ]);
    }

    public function paymentStore(Request $request){
           if($request->product_id == NULL){
            return redirect()->back()->with('message','Please add any product');
           }else{

            $this->validate($request,[
              'payment_method' => 'required',

            ]);

            if($request->payment_method == 'Bkash' && $request->transaction_no == NULL){

              return redirect()->back()->with('message','please enter your transaction number');
            }

            DB::transaction(function() use($request){

              $payment = new Payment();
              $payment->payment_method =  $request->payment_method;
              $payment->transaction_no =  $request->transaction_no;

              if($payment->save()){
                $order = new Order();
                $order->payment_id = $payment->id;
                $order->user_id = Auth::user()->id;
                $order->shipping_id = Session::get('shipping_id');
                $order_data = Order::orderBy('id','desc')->first();
                if($order_data == null){
                   $firstReg = '0';
                   $order_no = $firstReg+1;
                }else{
                   $order_data = Order::orderBy('id','desc')->first()->order_no;
                   $order_no =   $order_data+1;
                }

                $order->order_no = $order_no;
                $order->order_total_amount = $request->order_total;
                $order->status = '0';
                if($order->save()){
                  $contents = Cart::content();
                  foreach($contents as $content){
                     $order_details = new OrderDetail();
                     $order_details->order_id = $order->id;
                     $order_details->product_id = $content->id;
                     $order_details->size_id = $content->options->size_id ?? null;
                     $order_details->quantity= $content->qty;
                     $order_details->coupon_id= collect(Session::get('coupon'))->where('product_id', $content->id)->first()['coupon_id'] ?? null;
                     $order_details->customer_id= Auth::user()->id;
                     $order_details->save();
                  }
                }
              }
            });
          }
            Session::put('coupon', []);
            Cart::destroy();

            return redirect()->route('customer.order.list')->with('success','Data save successfully');

    }

    public function orderList(){
      return view('frontend.single_page.customer.customer-order-list',[
           'products' => Product::orderBy('id','desc')->get(),
            'categories' => Category::orderBy('id','desc')->get(),
            'brands' => Brand::orderBy('id','desc')->get(),
            // 'orders' => Order::where('user_id','7')->get(),
            'orders' => Order::where('user_id',Auth::user()->id)->get(),

      ]);
    }

    public function orderDetails($id){
            $order_data = Order::findOrFail($id);
            $order = Order::where('id',$order_data->id)->where('user_id',Auth::user()->id)->first();
                                    $ordernum = Order::where('user_id',Auth::user()->id)->count();

            if($order == false){
               return redirect()->back()->with('error','Do not try to be oversmart !');
            } else {

            $order = Order::with(['OrderDetail'])->where('id',$order_data->id)->where('user_id',Auth::user()->id)->first();

              return view('frontend.single_page.customer.customer-order-details',[
                    'products' => Product::orderBy('id','desc')->get(),
                    'categories' => Category::orderBy('id','desc')->get(),
                    'brands' => Brand::orderBy('id','desc')->get(),
                    'order' =>  $order,
                    'ordernum' =>$ordernum,


              ]);
            }


    }

     public function editAccount($id){
          $user = User::findOrFail($id);

          return view('frontend.single_page.customer.edit-account',[
                'user' =>  $user,
                'categories' => Category::orderBy('id','desc')->get(),
                'brands' => Brand::orderBy('id','desc')->get(),
                'products' => Product::orderBy('id','desc')->get(),
            ]);
     }

      public function storeAccount(Request $request,$id){

           $this->validate($request, [

              'email' => [
                'required',
                Rule::unique('users')->ignore($id , 'id'),
              ],


            ]);

          $user = User::findOrFail($id);
          $user->name = $request->name;
          $user->email = $request->email;

          $user->mobile = $request->mobile;
          $user->address = $request->address;
          $user->save();
          return redirect()->route('dashboard');
     }

     public function passwordChange(){

          return view('frontend.single_page.customer.customer-password-change',[

                'categories' => Category::orderBy('id','desc')->get(),
                'brands' => Brand::orderBy('id','desc')->get(),
                'products' => Product::orderBy('id','desc')->get(),
          ]);
    }

    public function passwordUpdate(request $request){
        $this->validate($request,[
         'current_password'=>'required',
         'new_password'=>'required|min:6',
         'confirm_new_password'=>'required_with:new_password|same:new_password'


        ]);
        if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])){
            $data=User::find(Auth::user()->id);
            $data->password=bcrypt($request->new_password);
            $data->save();
            return redirect()->route('dashboard')->with('success','Password Changed successfully');
        }else{
            return redirect()->back()->with('error','Sorry! your current Password does not match');
        }
    }


    public function couponstore(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return back()->withErrors('Invalid coupon code. Please try again.');
        }

        dispatch_now(new UpdateCoupon($coupon));

        return back()->with('success_message', 'Coupon has been applied!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function coupondestroy()
    {
        session()->forget('coupon');

        return back()->with('success_message', 'Coupon has been removed.');
    }

}
