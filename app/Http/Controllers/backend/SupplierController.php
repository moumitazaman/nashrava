<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use App\Model\Supplier;
use App\User;
use Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('backend.supplier.index',[
                'supplier_info' => Supplier::orderBy('id','desc')->get()
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {

         $supplier_info = new Supplier();
         $supplier_info->fill($request->all());
         $supplier_info->created_by = Auth::user()->id;
         $supplier_info->save();

        return redirect()->route('supplier.index');
        

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
        return view('backend.supplier.edit',[
            'supplier_info' => Supplier::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, $id)
    {
        $supplier_info = Supplier::findOrFail($id);
        $supplier_info->fill($request->all());
        $supplier_info->updated_by = Auth::user()->id;
        if($supplier_info->save()){
            return redirect()->route('supplier.index');
        }else{
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $supplier_info = Supplier::findOrFail($id);
       if($supplier_info->delete()){
        return redirect()->route('supplier.index');
       }else{
        return redirect()->back();
       }

    }

    
}
