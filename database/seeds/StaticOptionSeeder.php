<?php

use Illuminate\Database\Seeder;

class StaticOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        set_static_option('mobile', '+880 1234-567890');
        set_static_option('email', 'info@example.com');
        set_static_option('facebook', '#');
        set_static_option('twitter', '#');
        set_static_option('linkedin', '#');
        set_static_option('google', '#');
        set_static_option('rss', '#');
        set_static_option('banner_image', null);
        set_static_option('banner_image', null);
    }
}
