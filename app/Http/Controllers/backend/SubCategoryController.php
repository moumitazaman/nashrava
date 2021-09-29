<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\SubCategoryRequest;
use App\User;
use Auth;
use App\Model\SubCategory;
use App\Model\Category;

class SubCategoryController extends Controller
{
   public function index()
    {
        return view('backend.category.sub_category.index',[
            'sub_categories' => SubCategory::orderBy('id','desc')->get()
        ]);
    }

    
    public function create()
    {
        return view('backend.category.sub_category.create',[
            
            'categories' => Category::all()

        ]);
    }

    
    public function store(SubCategoryRequest $request)
    {
       $sub_categories = new SubCategory();
       $sub_categories->fill($request->all());
       $sub_categories->created_by = Auth::user()->id;
       if($sub_categories->save()){
          return redirect()->route('sub-category.index')->with('success','Sub Category Created Successfully');
       }else{
          return redirect()->back()->with('error','Sub Category Does not Created Successfully');;
       }
    }

    public function edit($id)
    {
        $sub_categories = SubCategory::findOrFail($id);
        return view('backend.category.sub_category.edit',[
          'sub_category' => $sub_categories
        ]);
    }

    public function update(Request $request, $id)
    {      
          $this->validate($request, [
            'sub_category_name' => [
                'required',
                Rule::unique('sub_categories')->ignore($id , 'id'),
            ],
          ]);

           $sub_categories = SubCategory::findOrFail($id);
           $sub_categories->fill($request->all());
           $sub_categories->updated_by = Auth::user()->id;
           if($sub_categories->save()){
              return redirect()->route('sub-category.index')->with('success','Sub Category Updated Successfully');
           }else{
              return redirect()->back()->with('error','Sub Category Does not Updated Successfully');
           }
    }

   
    public function destroy($id)
    {
        $sub_categories = SubCategory::findOrFail($id);
        if($sub_categories->delete()){
            return redirect()->route('sub-category.index')->with('success','Sub Category Deleted Successfully');
        }else{
            return redirect()->back()->with('error','Sub Category Does not Deleted Successfully');
        }
    }
}
