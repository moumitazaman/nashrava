<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\BrandRequest;
use App\User;
use Auth;
use App\Model\Brand;

class BrandController extends Controller
{
  
   public function index()
    {
        return view('backend.brand.index',[
            'brands' => Brand::orderBy('id','desc')->get()
        ]);
    }

    
    public function create()
    {
        return view('backend.brand.create');
    }

    
    public function store(BrandRequest $request)
    {
       $brand = new Brand();
       $brand->fill($request->all());
       $brand->created_by = Auth::user()->id;
       if($brand->save()){
          return redirect()->route('brand.index')->with('success','Brand Created Successfully');
       }else{
          return redirect()->back()->with('error','Sorry! Brand Does not Created Successfully');
       }
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.edit',[
          'brand' => $brand
        ]);
    }

    public function update(Request $request, $id)
    {      
          $this->validate($request, [
            'brand_name' => [
                'required',
                Rule::unique('brands')->ignore($id , 'id'),
            ],
          ]);

           $brand = Brand::findOrFail($id);
           $brand->fill($request->all());
           $brand->updated_by = Auth::user()->id;
           if($brand->save()){
              return redirect()->route('brand.index')->with('success','Brand Updated Successfully');
           }else{
              return redirect()->back()->with('error','Sorry! Brand Does not Updated Successfully');
           }
    }

   
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        if($brand->delete()){
            return redirect()->route('brand.index')->with('success','Brand Deleted Successfully');
        }else{
            return redirect()->back()->with('error','Brand Does not Deleted Successfully');
        }
    }

    
    public function changeBrandStatus($id)
    {
        $brand = Brand::findOrFail($id);
        if( $brand->status == 0 ){
         $brand->status = '1';
        }else{
         $brand->status = '0';   
        }
         $brand->save();
  
        return redirect()->route('brand.index')->with('success','Status change successfully.');
    }
}
