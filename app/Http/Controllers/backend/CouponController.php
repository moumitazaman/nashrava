<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Coupon;
use App\Model\Product;
use App\User;
use Auth;
use Session;
class CouponController extends Controller
{
    
    public function index()
    {
        // $coupons = Coupon::get()->toArray();
        // dd($coupons); die;
        // $coupons = json_decode(json_encode($coupons),true);
        // echo "<pre>" ; print_r($coupons); die;
        $coupons = Coupon::orderBy('id','desc')->get();
        return view('backend.coupon.index',[
           'coupons' => $coupons
        ]);
    }

   
    public function create()
    {
        $users = User::select('email')->where('status','1')->get()->toArray();
        return view('backend.coupon.create',[
             
             'products' => Product::all(),
             'users' => $users

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   


        $coupon = new Coupon();
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);
            // echo "<br/>";

            $rules = [
                'products' => 'required',
                'coupon_option' => 'required',
                'coupon_type' => 'required',
                'amount_type' => 'required',
                'amount' => 'required|numeric',
                'expiry_date' => 'required',

            ];
            
            $customMessage = [
                'products' => 'select products',
                'coupon_option' => 'select coupon_option',
                'coupon_type' => 'select coupon_type',
                'amount_type' => 'select amount_type',
                'amount' => 'select amount',
                'expiry_date' => 'select expiry_date',
            ];
        
        if(isset($data['alluser'])==1){
            $users = 'all';
            }
            else{
        
        $this->validate($request ,  $rules , $customMessage);
        if(isset($data['users'])){
          $users = implode(',', $data['users']);  
        }
            }

        if(isset($data['products'])){
            $products = implode(',', $data['products']);  
        }

        if($data['coupon_option'] == 'Automatic' ){
            $coupon_code = str_random(10);  
        } else {
            $coupon_code = $data['coupon_code'];
        }

        // echo $coupon_code; die;
        $coupon->coupon_option = $data['coupon_option'];
        $coupon->coupon_type = $data['coupon_type'];
        $coupon->coupon_code = $coupon_code;
        $coupon->amount_type = $data['amount_type'];
        $coupon->amount = $data['amount'];
        $coupon->products = $products;
        $coupon->users = $users;
        $coupon->expiry_date = date('Y-m-d',strtotime($data['expiry_date']));
        $coupon->status = 1;
        $coupon->save();
        Session::flash('success_message');
        return redirect()->route('coupons.index')->with('success','Coupon Created Successfully');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
$coupon = Coupon::findOrFail($id);
        $users = User::select('email')->where('status','1')->get()->toArray();
        return view('backend.coupon.edit',[
             'coupon' =>$coupon,
             'products' => Product::all(),
             'users' => $users

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);
         $data = $request->all();
            if(isset($data['alluser'])==1){
            $users = 'all';
            }
            else{
        
        if(isset($data['users'])){
          $users = implode(',', $data['users']);  
        }
            }

        if(isset($data['products'])){
            $products = implode(',', $data['products']);  
        }

        if($data['coupon_option'] == 'Automatic' ){
            $coupon_code = str_random(10);  
        } else {
            $coupon_code = $data['coupon_code'];
        }

        // echo $coupon_code; die;
        $coupon->coupon_option = $data['coupon_option'];
        $coupon->coupon_type = $data['coupon_type'];
        $coupon->coupon_code = $coupon_code;
        $coupon->amount_type = $data['amount_type'];
        $coupon->amount = $data['amount'];
        $coupon->products = $products;
        $coupon->users = $users;
        $coupon->expiry_date = date('Y-m-d',strtotime($data['expiry_date']));
        $coupon->status = 1;
        $coupon->save();
        Session::flash('success_message');
        return redirect()->route('coupons.index')->with('success','Coupon Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->route('coupons.index')->with('success','Data Deleted Successfully');
    }

    public function changeStatus($id)
    {
        $coupon = Coupon::findOrFail($id);
        if($coupon->status == 0 ){
        $coupon->status = '1';
        }else{
        $coupon->status = '0';   
        }
        $coupon->save();
  
        return redirect()->route('coupons.index')->with('success','Status change successfully.');
    }
}
