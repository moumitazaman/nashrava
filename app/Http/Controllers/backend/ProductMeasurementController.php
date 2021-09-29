<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProductMeasurement;
use App\Model\Product;
use App\Model\SizeMeasurement;

class ProductMeasurementController extends Controller
{
    
    public function index()
    {
        return view('backend.product-size-measurement.index',[
             'measurements' => ProductMeasurement::all()
       ]); 
    }

    public function create()
    {
       return view('backend.product-size-measurement.create',[
            'products' => Product::orderBy('id','desc')->get(),
            'sizes' => SizeMeasurement::all(),
       ]);
    }

   
    public function store(Request $request)
    {             
           $pro_meas = new ProductMeasurement();
           $pro_meas->fill($request->all());
           $pro_meas->save();
           return redirect()->route('product-measurement.create')->with('success','Data Created Successfully');
        
    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
