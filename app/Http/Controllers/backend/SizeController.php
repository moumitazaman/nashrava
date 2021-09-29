<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;
use App\Model\Size;
use App\User;
use Auth;

class SizeController extends Controller
{
    public function index()
    {
        return view('backend.size.index',[
            'sizes' => Size::orderBy('id','desc')->get()
        ]);
    }

    
    public function create()
    {
        return view('backend.size.create');
    }

    
    public function store(SizeRequest $request)
    {
       $size = new Size();
       $size->fill($request->all());
       $size->created_by = Auth::user()->id;
       if($size->save()){
          return redirect()->route('size.create')->with('success','Size Created Successfully');
       }else{
          return redirect()->back()->with('error','Sorry! Size Does not Created Successfully');
       }
    }

    public function edit($id)
    {
        $size = Size::findOrFail($id);
        return view('backend.size.edit',[
          'size' => $size
        ]);
    }

    public function update(Request $request, $id)
    {      
          $this->validate($request, [
            'size_name' => [
                'required',
                Rule::unique('sizes')->ignore($id , 'id'),
            ],
          ]);

           $size = Size::findOrFail($id);
           $size->fill($request->all());
           $size->updated_by = Auth::user()->id;
           if($size->save()){
              return redirect()->route('size.index')->with('success','Size Updated Successfully');
           }else{
              return redirect()->back()->with('error','Sorry! Size Does not Updated Successfully');
           }
    }

   
    public function destroy($id)
    {
        $size = Size::findOrFail($id);
        if($size->delete()){
            return redirect()->route('size.index')->with('success','Size Deleted Successfully');
        }else{
            return redirect()->back()->with('error','Size Does not Deleted Successfully');
        }
    }
}
