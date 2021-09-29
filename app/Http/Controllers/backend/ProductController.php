<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Size;
use App\Model\SubCategory;
use App\Model\Product;
use App\Model\ProductSubImage;
use App\Model\ProductSize;
use App\User;
use Auth;
use File;
use DB;
use App\Model\Purchase;

class ProductController extends Controller
{

    public function index()
    {
        return view('backend.product.index', [
            'products' => Product::orderBy('id', 'desc')->get()
        ]);
    }


    public function create()
    {
        return view('backend.product.create', [

            'categories' => Category::all(),
            'brands' => Brand::all(),
            'sizes' => Size::all(),
            'sub_categories' => SubCategory::all(),
            'purchases' => Purchase::orderBY('id', 'desc')->get(),

        ]);

    }


    public function store(Request $request)
    {

        DB::transaction(function () use ($request) {
            /*  $this->validate($request,[
                'category_id' => 'required',
                'sub_category_id' => 'required',
                'brand_id' => 'required',
                'product_name' => 'required',
                'image' => 'required',
                'title' => 'required',
                'slug' => 'required|unique:products,slug',
                'price' => 'required',
                'price_range' => 'required',
                'qty' => 'required',
                'details' => 'required'
                ]);*/
            //dd($request->all());

            $product = new Product();
            $product->fill($request->all());
            $product->slug = Str::slug($request->slug);
            if ($request->hasFile('image')) {
                $product->image = $request->file('image')
                    ->move('public/upload/product_image/', str_random(40) . '.' . $request->image->extension());
            }

            if ($product->save()) {
                $files = $request->sub_image;
                if (!empty($files)) {
                    foreach ($files as $file) {
                        $imgName = date('YmdHi') . $file->getClientOriginalName();
                        $file->move(public_path('upload/product_image/product_sub_images'), $imgName);
                        $subimage['sub_image'] = $imgName;

                        $subimage = new ProductSubImage();
                        $subimage->product_id = $product->id;
                        $subimage->sub_image = $imgName;
                        $subimage->save();

                    }
                }

                $total_qty_counter = 0;
                foreach (Size::all() as $size) {
                    for ($counter = $request->input('size_qty_of_' . Str::slug($size->size_name, '_')); $counter >= 1; $counter--) {
                        $total_qty_counter++;
                    }
                }

                if ($total_qty_counter > $product->qty) {
                    return back()->withErrors(['Please use correct quantity', 'Total product QTY is: ' . $product->qty . ' But you use :' . $total_qty_counter . ' in the size section']);
                }

                foreach (Size::all() as $size) {
                    for ($counter = $request->input('size_qty_of_' . Str::slug($size->size_name, '_')); $counter >= 1; $counter--) {
                        $product_size = new ProductSize();
                        $product_size->product_id = $product->id;
                        $product_size->size_id = $size->id;
                        $product_size->save();
                    }
                }
            } else {
                return redirect()->back()->with('error', 'Sorry! Product Does not Created Successfully');
            }
        });
        return redirect()->back()->with('success', 'Product Created Successfully');
    }


    public function show($id)
    {
        return view('backend.product.show', [
            'product_details' => Product::findOrFail($id)
        ]);
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $size_array = ProductSize::select('size_id')->where('product_id', $product->id)->orderBY('id', 'asc')->get()->toArray();
        return view('backend.product.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'sizes' => Size::all(),
            'sub_categories' => SubCategory::all(),
            'size_array' => $size_array,
            'purchases' => Purchase::orderBY('id', 'desc')->get(),
        ]);
    }


    public function update(Request $request, $id)
    {

        DB::transaction(function () use ($request, $id) {
            $this->validate($request, [
                'category_id' => 'required',
                'sub_category_id' => 'required',
                'brand_id' => 'required',
                'product_name' => 'required',
                'title' => 'required',
                'slug' => [
                    'required',
                    Rule::unique('products')->ignore($id, 'id'),
                ],
                'price' => 'required',
                'qty' => 'required',
                'details' => 'required',

            ]);


            $product = Product::findOrFail($id);
            $product->fill($request->all());
            $product->slug = Str::slug($request->slug);
            if ($request->hasFile('image')) {
                if ($product->image != null) {
                    $this->deleteFile($product->image);
                }
                $product->image = $request->file('image')
                    ->move('public/upload/product_image/', str_random(40) . '.' . $request->image->extension());
            }

            if ($product->save()) {
                /*product sum image table data updated*/
                $files = $request->sub_image;

                if (!empty($files)) {
                    $sub_image = ProductSubImage::where('product_id', $id)->get()->toArray();
                    foreach ($sub_image as $value) {
                        if (!empty($value)) {
                            unlink('public/upload/product_image/product_sub_images/' . $value['sub_image']);
                        }

                    }
                    ProductSubImage::where('product_id', $id)->delete();

                }

                if (!empty($files)) {
                    foreach ($files as $file) {
                        $imgName = date('YmdHi') . $file->getClientOriginalName();
                        $file->move(public_path('upload/product_image/product_sub_images'), $imgName);
                        $subimage['sub_image'] = $imgName;

                        $subimage = new ProductSubImage();
                        $subimage->product_id = $product->id;
                        $subimage->sub_image = $imgName;
                        $subimage->save();

                    }
                }
            }

            $total_qty_counter =  0;
            foreach (Size::all() as $size){
                for ($counter = $request->input('size_qty_of_'.Str::slug($size->size_name, '_'));  $counter >= 1; $counter--){
                    $total_qty_counter ++;
                }
            }

            if($total_qty_counter > $product->qty){
                return back()->withErrors(['Please use correct quantity', 'Total product QTY is: '.$product->qty.' But you use :'.$total_qty_counter.' in the size section']);
            }

            ProductSize::where('product_id', $id)->delete();

            foreach (Size::all() as $size){
                for ($counter = $request->input('size_qty_of_'.Str::slug($size->size_name, '_'));  $counter >= 1; $counter--){
                    $product_size = new ProductSize();
                    $product_size->product_id = $product->id;
                    $product_size->size_id = $size->id;
                    $product_size->save();
                }
            }
        });
        return redirect()->route('product.index')->with('success', 'Product Updated Successfully');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image != null) {
            $this->deleteFile($product->image);
        }


        $subimage = ProductSubImage::where('product_id', $product->id)->get()->toArray();
        if (!empty($subimage)) {

            foreach ($subimage as $value) {
                if (!empty($value)) {
                    unlink('public/upload/product_image/product_sub_images/' . $value['sub_image']);
                }
            }

        }
        ProductSubImage::where('product_id', $product->id)->delete();
        ProductSize::where('product_id', $product->id)->delete();
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product Deleted Successfully');

    }

    private function deleteFile($path)
    {
        File::delete($path);
    }

    public function changeStatus($id)
    {
        $product = Product::findOrFail($id);
        if ($product->best_status == 0) {
            $product->best_status = '1';
        } else {
            $product->best_status = '0';
        }
        $product->save();

        return redirect()->route('product.index')->with('success', 'Status change successfully.');
    }

    public function featureChangeStatus($id)
    {
        $product = Product::findOrFail($id);
        if ($product->featured == 0) {
            $product->featured = '1';
        } else {
            $product->featured = '0';
        }
        $product->save();

        return redirect()->route('product.index')->with('success', 'Status change successfully.');
    }

    public function offersChangeStatus($id)
    {
        $product = Product::findOrFail($id);
        if ($product->offers == 0) {
            $product->offers = '1';
        } else {
            $product->offers = '0';
        }
        $product->save();

        return redirect()->route('product.index')->with('success', 'Status change successfully.');
    }


    public function newarrival_index()
    {
        return view('backend.newarrivals.index', [
            'products' => Product::orderBy('id', 'desc')->get()
        ]);
    }

    public function newarrivalChangeStatus($id)
    {
        $product = Product::findOrFail($id);
        if ($product->new_arrival == 0) {
            $product->new_arrival = '1';
        } else {
            $product->new_arrival = '0';
        }
        $product->save();

        return redirect()->route('newarrival.index')->with('success', 'Status change successfully.');
    }

}
