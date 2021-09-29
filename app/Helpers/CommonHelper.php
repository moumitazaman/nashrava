<?php

use App\Model\Coupon;
use App\Model\OrderDetail;
use App\StaticOption;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

if (!function_exists('random_code')){

    function set_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
        return false;
    }

    function get_static_option($key)
    {
        if (StaticOption::where('option_name', $key)->first()) {
            $return_val = StaticOption::where('option_name', $key)->first();
            return $return_val->option_value;
        }
        return null;
    }

    function update_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        } else {
            StaticOption::where('option_name', $key)->update([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
        return false;
    }

    //Use for front and session data
    function remove_from_coupon_session($product_id){
        if (!Session::get('coupon')){
            Session::put('coupon', []);
        }

        $old_session = Session::get('coupon');

        $new_custom_array = array();
        foreach ($old_session as $old_session_x){
            if ($old_session_x['product_id'] != $product_id){
                array_push($new_custom_array, $old_session_x);
            }
        }

        Session::put('coupon', $new_custom_array);
        $new_session = Session::get('coupon');

        return response()->json( [
            'error' => 'Invalid Coupon',
            'dev_note' => [
                //'old_session' => $old_session,
                //'new_session' => $new_session,
                ]
            ]);
    }
    //Use for front and session data
    function get_discount_price_by_product_id($product_id){
        $product = \App\Model\Product::find($product_id);
        $price = $product->price;
        if (Session::get('coupon'))
        foreach (Session::get('coupon') as $coupon){
            if ($coupon['product_id'] == $product_id){
                $coupon = Coupon::find($coupon['coupon_id']);
                if($coupon->amount_type == 'Percentage'){
                    $price =  $product->price - ($product->price * ($coupon->amount/100));
                }else{
                    $price = $product->price - $coupon->amount;
                }
            }
        }

        if($product->discount > 0){
            $price = $price - $product->discount;
        }
        return $price;
    }

    //Global discount check for backend site
    function discount_price($user_id, $product_id, $coupon_id){
        $coupon = Coupon::find($coupon_id);
        $product = \App\Model\Product::find($product_id);
        $price = $product->price;
       /* if (in_array(\App\User::find($user_id)->email, explode(",",$coupon->users)) && in_array($product_id, explode(",",$coupon->products))){
            if($coupon->amount_type == 'Percentage'){
                $price = $product->price - ($product->price * ($coupon->amount/100));
            }else{
                $price = $product->price - $coupon->amount;
            }
        }*/
        
        if($coupon->users!="all"){
            if (in_array(\App\User::find($user_id)->email, explode(",",$coupon->users)) && in_array($product_id, explode(",",$coupon->products))){
                if($coupon->amount_type == 'Percentage'){
                    $price = $product->price - ($product->price * ($coupon->amount/100));
                }else{
                    $price = $product->price - $coupon->amount;
                }
            }
        }else{
            if (in_array($product_id, explode(",",$coupon->products))){
                if($coupon->amount_type == 'Percentage'){
                    $price = $product->price - ($product->price * ($coupon->amount/100));
                }else{
                    $price = $product->price - $coupon->amount;
                }
            }
        }

        if($product->discount > 0){
            $price = $price - $product->discount;
        }
        return $price;
    }
}
