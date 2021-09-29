<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slider;
class SliderController extends Controller
{
   
    public function index()
    {
        return view('backend.slider.index',[
            
            'sliders' => Slider::all(),

        ]);
    }

   
    public function create()
    {
       return view('backend.slider.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
           'image'=>'required'
        ]);
        $data = new Slider();
          $data->slider_name = $request->slider_name;
          $data->highlight = $request->highlight;
          $data->short_text = $request->shorttext;
          $data->shopnow_url = $request->shopnow_url;
          $data->explore_url = $request->explore_url;




          if($request->file('image')){

                    $file=$request->file('image');
                   
                    $filename=date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('upload/slider_image'),$filename);
                    $data['image']=$filename;
                }

        $data->save();
        return redirect()->route('slider.index')->with('success','Data Inserted successfully');

    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
      $data = Slider::findOrFail($id);
      return view('backend.slider.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {    

         
         $data = Slider::findOrFail($id);
    
         $data->slider_name = $request->slider_name;
         $data->highlight = $request->highlight;
          $data->short_text = $request->shorttext;
          $data->shopnow_url = $request->shopnow_url;
          $data->explore_url = $request->explore_url;
         if($request->file('image')){

                    $file=$request->file('image');
                    @unlink(public_path('upload/slider_image/'.$data->image));
                    $filename=date ('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('upload/slider_image'),$filename);
                    $data['image']=$filename;
                }

        $data->save();
        return redirect()->route('slider.index')->with('success','Data Updated successfully');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        if(file_exists('public/upload/slider_image/'.$slider->image) AND !empty($slider->image)){
             unlink('public/upload/slider_image/'.$slider->image);
        }
        $slider->delete();
        return redirect()->route('slider.index')->with('success','Data Deleted successfully');
    }

    public function changeUpperStatus($id)
    {
        $slider = Slider::findOrFail($id);
        if( $slider->upper == 0 ){
         $slider->upper = '1';
        }else{
         $slider->upper = '0';   
        }
         $slider->save();
  
        return redirect()->route('slider.index')->with('success','Status change successfully.');
    }

    public function changeMiddleStatus($id)
    {
        $slider = Slider::findOrFail($id);
        if( $slider->middle == 0 ){
         $slider->middle = '2';
        }else{
         $slider->middle = '0';   
        }
         $slider->save();
  
        return redirect()->route('slider.index')->with('success','Status change successfully.');

    }

    public function changeLowerStatus($id)
    {
        $slider = Slider::findOrFail($id);
        if( $slider->lower == 0 ){
         $slider->lower = '3';
        }else{
         $slider->lower = '0';   
        }
         $slider->save();
  
        return redirect()->route('slider.index')->with('success','Status change successfully.');

    }
}
