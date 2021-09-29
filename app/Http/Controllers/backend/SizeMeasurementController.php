<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Model\SizeMeasurement;
use App\Http\Requests\MeasurementRequest;
use App\User;
use Auth;

class SizeMeasurementController extends Controller
{
     public function index()
    {
        return view('backend.size-measurement.index',[
            'measurements' => SizeMeasurement::orderBy('id','desc')->get()
        ]);
    }

    
    public function create()
    {
        return view('backend.size-measurement.create');
    }

    
    public function store(MeasurementRequest $request)
    {
       $measurement = new SizeMeasurement();
       $measurement->fill($request->all());
       $measurement->created_by = Auth::user()->id;
       if($measurement->save()){
          return redirect()->route('size-measurement.create')->with('success','Measurement Created Successfully');
       }else{
          return redirect()->back()->with('error','Sorry! Measurement Does not Created Successfully');
       }
    }

    public function edit($id)
    {
        $measurement = SizeMeasurement::findOrFail($id);
        return view('backend.size-measurement.edit',[
          'measurement' => $measurement
        ]);
    }

    public function update(Request $request, $id)
    {      
          $this->validate($request, [
            'measurement' => [
                'required',
                Rule::unique('size_measurements')->ignore($id , 'id'),
            ],
          ]);

           $measurement = SizeMeasurement::findOrFail($id);
           $measurement->fill($request->all());
           $measurement->updated_by = Auth::user()->id;
           if($measurement->save()){
              return redirect()->route('size-measurement.index')->with('success','Measurement Updated Successfully');
           }else{
              return redirect()->back()->with('error','Sorry! Measurement Does not Updated Successfully');
           }
    }

   
    public function destroy($id)
    {
        $measurement = SizeMeasurement::findOrFail($id);
        if($measurement->delete()){
            return redirect()->route('size-measurement.index')->with('success','Measurement Deleted Successfully');
        }else{
            return redirect()->back()->with('error','Measurement Does not Deleted Successfully');
        }
    }
}
