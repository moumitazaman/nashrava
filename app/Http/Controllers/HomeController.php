<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Artisan::call('config:cache');
        return view('backend.layout.home');
        
    }

    public function categoryCart() {
        return view('backend.layout.home-management.category-home'); 
    }

    public function customerCart() {
        return view('backend.layout.home-management.customer-home'); 
    }

    public function reportCart() {
        return view('backend.layout.home-management.report-home'); 
    }

    public function orderCart() {
        return view('backend.layout.home-management.order-home'); 
    }

    public function otherCart() {
        return view('backend.layout.home-management.other-home'); 
    }
}
