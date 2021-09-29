<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\CategoryRequest;
use App\User;
use Auth;
use App\Model\Category;
use File;

class CategoryController extends Controller
{
   
    public function index()
    {
        return view('backend.category.index',[
            'category_info' => Category::orderBy('id','desc')->get()
        ]);
    }

    
    public function create()
    {
        return view('backend.category.create');
    }

    
    public function store(Request $request)
    {  
       $this->validate($request,[
          'category_name' => 'required|unique:categories,category_name',
       ]);
       $category_info = new Category();
       $category_info->fill($request->all());
       $category_info->created_by = Auth::user()->id;
        if($request->hasFile('category_image')){
              $category_info->category_image = $request->file('category_image')
                ->move('public/upload/category_image/', str_random(40) . '.' . $request->category_image->extension());
        }
       if($category_info->save()){
          return redirect()->route('category.index');
       }else{
          return redirect()->back();
       }
    }

    public function edit($id)
    {
        $category_info = Category::findOrFail($id);
        return view('backend.category.edit',[
          'category_info' => $category_info
        ]);
    }

    public function update(Request $request, $id)
    {      
          $this->validate($request, [
            'category_name' => [
                'required',
                Rule::unique('categories')->ignore($id , 'id'),
            ],
          ]);

           $category_info = Category::findOrFail($id);
           $category_info->fill($request->all());
           $category_info->updated_by = Auth::user()->id;
            if($request->hasFile('category_image')){
            if ($category_info->category_image != null){
                 $this->deleteFile($category_info->category_image);
            }
            $category_info->category_image = $request->file('category_image')
                ->move('public/upload/category_image/', str_random(40) . '.' . $request->category_image->extension());
        }
           if($category_info->save()){
              return redirect()->route('category.index');
           }else{
              return redirect()->back();
           }
    }

   
    public function destroy($id)
    {
        $category_info = Category::findOrFail($id);
        if ( $category_info->category_image != null){
                 $this->deleteFile( $category_info->category_image);
            }


        if($category_info->delete()){
            return redirect()->route('category.index');
        }else{
            return redirect()->back();
        }
    }

     private function deleteFile($path)
    {
        File::delete($path);
    }

    public function changeCategoryStatus($id)
    {
        $category = Category::findOrFail($id);
        if( $category->status == 0 ){
         $category->status = '1';
        }else{
         $category->status = '0';   
        }
         $category->save();
  
        return redirect()->route('category.index')->with('success','Status change successfully.');
    }
}
