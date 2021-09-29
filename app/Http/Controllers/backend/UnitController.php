<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Unit;
use App\Http\Requests\UnitRequest;
use App\User;
use Auth;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('backend.unit.index',[
          'unit_info' => Unit::orderBy('id','desc')->get()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
        $unit_info = new Unit();
        $unit_info->fill($request->all());
        $unit_info->created_by = Auth::user()->id;
        if($unit_info->save()){
            return redirect()->route('unit.index');
        }else{
            return redirect()->back();
        }
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
        $unit_info = Unit::findOrFail($id);
        return view('backend.unit.edit',[
           'unit_info' => $unit_info
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRequest $request, $id)
    {
        $unit_info = Unit::findOrFail($id);
        $unit_info->fill($request->all());
        $unit_info->updated_by = Auth::user()->id;
        if($unit_info->save()){
            return redirect()->route('unit.index');
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
        $unit_info = Unit::findOrFail($id);
        if($unit_info->delete()){
            return redirect()->route('unit.index');
        }else{
            return redirect()->back();
        }
    }
}
