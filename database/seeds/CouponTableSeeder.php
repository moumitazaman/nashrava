<?php

use Illuminate\Database\Seeder;
use App\Model\Coupon;
class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $couponRecords = [
            ['id' => 1 , 'coupon_option' => 'Manual' , 'coupon_code' => 'test10' , 'categories' => '1,2' , 'users' => 'admin@gmail.com , users@gmail.com' , 'coupon_type' => 'Single' , 'amount_type' => 'Percentage' , 'amount' => '10' , 'expiry_date' => '2021-3-6' ,'status' => 1],
             ['id' => 2 , 'coupon_option' => 'Manual' , 'coupon_code' => 'test11' , 'categories' => '1,2' , 'users' => 'admin@gmail.com , users@gmail.com' , 'coupon_type' => 'Single' , 'amount_type' => 'Percentage' , 'amount' => '100' , 'expiry_date' => '2021-3-6' ,'status' => 0]
        ];

        Coupon::insert($couponRecords);
    }
}
