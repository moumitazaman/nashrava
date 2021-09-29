<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /*
        Route::get('setting','backend\ApplicationController@index')->name('application.setting');
        Route::post('setting','backend\ApplicationController@update');
     */
    public function index(){
        return view('backend.page-setting.index');
    }

    public function update(Request $request){
       

        update_static_option('aboutus', $request->aboutus);
        update_static_option('delivery', $request->delivery);
        update_static_option('terms', $request->terms);

       

       


        return back()->with('success','Successfully updated');
    }
}
