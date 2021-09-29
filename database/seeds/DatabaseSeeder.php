<?php

use Illuminate\Database\Seeder;
use App\Model\Coupon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CouponTableSeeder::class);

        $this->call(StaticOptionSeeder::class);

    }
}
