<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ShippingCost;

class ShippingCostController extends Controller
{
   
    public function index()
    {
        return view('backend.shipping-cost.index',[
            'shipping_costs' => ShippingCost::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.shipping-cost.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
             $this->validate($request , [
                 'shipping_area' => 'required',
                 'shipping_cost' => 'required',

             ]);
            $shippingCost = new ShippingCost();
            $shippingCost->shipping_area = $request->shipping_area;
            $shippingCost->shipping_cost = $request->shipping_cost;
            $shippingCost->save();
            return redirect()->route('shipping-cost.index')->with('success','ShippingCost data saved successfully');

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

        return view('backend.shipping-cost.edit',[
              'shipping_cost' => ShippingCost::where('id' , $id)->first()
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
            $this->validate($request , [
                 'shipping_area' => 'required',
                 'shipping_cost' => 'required',

             ]);
            $shippingCost = ShippingCost::findOrFail($id);
            $shippingCost->shipping_area = $request->shipping_area;
            $shippingCost->shipping_cost = $request->shipping_cost;
            $shippingCost->save();
            return redirect()->route('shipping-cost.index')->with('success','ShippingCost data updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
