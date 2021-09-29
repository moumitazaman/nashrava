<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /*
        Route::get('setting','backend\ApplicationController@index')->name('application.setting');
        Route::post('setting','backend\ApplicationController@update');
     */
    public function index(){
        return view('backend.application-setting.index');
    }

    public function update(Request $request){
        $request->validate([
            'mobile' => 'required|string',
            'email' => 'required|email',
            'facebook' => 'required|string',
            'twitter' => 'required|string',
            'linkedin' => 'required|string',
            'google' => 'required|string',
            'rss' => 'required|string',
            'banner_image' => 'nullable|image',
            'newarrival_image' => 'nullable|image',

        ]);

        update_static_option('mobile', $request->mobile);
        update_static_option('email', $request->email);
        update_static_option('address', $request->address);

        update_static_option('facebook', $request->facebook);
        update_static_option('twitter', $request->twitter);
        update_static_option('linkedin', $request->linkedin);
        update_static_option('google', $request->google);
        update_static_option('rss', $request->rss);

        update_static_option('facebook_page_id', $request->facebook_page_id);
        update_static_option('facebook_page_access_token', $request->facebook_page_access_token);

        if($request->hasFile('banner_image')){
            $path = 'public/upload/banner_image/';
            $image_name= str_random(40) . '.' . $request->banner_image->extension();
            $request->file('banner_image')->move($path, $image_name);
            update_static_option('banner_image', $path.$image_name);
      }

      if($request->hasFile('newarrival_image')){
        $path = 'public/upload/newarrival_image/';
        $image_name= str_random(40) . '.' . $request->newarrival_image->extension();
        $request->file('newarrival_image')->move($path, $image_name);
        update_static_option('newarrival_image', $path.$image_name);
      }

      if($request->hasFile('facebook_section_background_image')){
        $path = 'public/upload/facebook_section_background_image/';
        $image_name= str_random(40) . '.' . $request->facebook_section_background_image->extension();
        $request->file('facebook_section_background_image')->move($path, $image_name);
        update_static_option('facebook_section_background_image', $path.$image_name);
      }

        return back()->with('success','Successfully updated');
    }
}
