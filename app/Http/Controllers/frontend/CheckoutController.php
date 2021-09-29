<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\User;
use DB;
use Mail;
use Auth;
use Session;
use App\Model\Shipping;
use App\Model\Payment;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Product;
use App\Model\ShippingCost;

class CheckoutController extends Controller
{   

   public function customerLogin(){
        
        return view('frontend.single_page.customer.customer-login',[

              'categories' => Category::orderBy('id','desc')->get(),
              'brands' => Brand::orderBy('id','desc')->get(),
              'products' => Product::orderBy('id','desc')->get(),

        ]);
    }

    public function customerSignup(){
          
            
            return view('frontend.single_page.customer.customer-signup',[
              'categories' => Category::orderBy('id','desc')->get(),
              'brands' => Brand::orderBy('id','desc')->get(),
              'products' => Product::orderBy('id','desc')->get(),


            ]);


  } 

    public function SignupStore(Request $request){
        
        DB::transaction(function() use($request){
              $this->validate($request,[
              'name'=>'required',
              'email'=>'required|unique:users,email',
              // 'mobile'=>['required','unique:users,mobile','regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
              'password'=>'required|min:9',
              'confirmation_password'=>'required_with:password|same:password'

           ]);
             
             $code=rand(0000,9999);
             $user = new User();

             $user->name=$request->name;
             $user->email=$request->email;
             $user->mobile = $request->mobile;
             $user->password = bcrypt($request->password);
             $user->code= $code;
             $user->status='1';
             $user->user_type = 'customer';
             $user->save();
          

             $data=array(
                'email'=>$request->email,
               
                'code'=>$code
             );
                   


             // Mail::send('frontend.emails.verify-email',$data,function($message) use($data){

             //    $message->from('shaykat932@gmail.com','Shaykat-Ecommerce');
             //    $message->to($data['email']);
             //    $message->subject('Please verifyed your email address to get access to Shaykat-Ecommerce');   


             // });


        });
           
          // return redirect()->route('email.verify')->with('success','You have successfully signup, please verify your email');
         return redirect()->route('customer.login'); 

    }




    public function checkOut(){
          return view('frontend.single_page.customer-checkout',[
              'categories' => Category::orderBy('id','desc')->get(),
              'brands' => Brand::orderBy('id','desc')->get(),
              'products' => Product::orderBy('id','desc')->get(),
              'shipping_costs' => ShippingCost::orderBy('id' , 'desc')->get(),
                            'order' => Order::where('user_id',Auth::user()->id)->count(),


          ]);
    }

    public function checkoutStore(Request $request){
              
             
              $this->validate($request,[
              'first_name'=>'required',
              'last_name'=>'required',
              //'mobile_no'=>['required','regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
              'mobile_no'=>['required','string'],
              'address'=>'required'
           ]);

           $checkout = new Shipping();

           $checkout->user_id = Auth::user()->id;
          
           $checkout->first_name = $request->first_name;
           $checkout->last_name = $request->last_name;
           $checkout->email = $request->email;
           $checkout->mobile_no = $request->mobile_no;
           $checkout->address = $request->address;
           $checkout->country = $request->country;
           $checkout->city = $request->city;
           $checkout->del_first_name = $request->del_first_name;
           $checkout->del_last_name = $request->del_last_name;
           $checkout->del_email = $request->del_email;
           $checkout->del_mobile_no = $request->del_mobile_no;
           $checkout->del_address = $request->del_address;
           $checkout->del_country = $request->del_country;
           $checkout->del_city = $request->del_city;
           $checkout->shipping_area = $request->shipping_area;
           $checkout->shipping_cost = $request->ship;
        
           $checkout->save();
           Session::put('shipping_id',$checkout->id);
           return redirect()->route('customer.payment')->with('success','Data Save Successfully');


    }
}
