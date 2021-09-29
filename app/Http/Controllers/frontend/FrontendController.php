<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\DB;
use App\Model\OrderDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\Coupon;

use App\Model\SubCategory;
use App\Model\Brand;
use App\Model\ProductSubImage;
use App\Model\ProductSize;
use App\Model\Slider;
use App\Model\ProductMeasurement;
use App\User;
use Auth;
use Illuminate\Support\Facades\Artisan;






class FrontendController extends Controller
{
	public function index(){
    // Artisan::call('config:cache');

    return view('frontend.layouts.home',[

         'products' => Product::orderBy('id','desc')->paginate(12),
         'best_sell_products' => Product::where('best_status','1')->orderBy('id','desc')->paginate(8),
         'offers' => Product::where('offers','1')->orderBy('id','desc')->get(),
         'categories' => Category::orderBy('id','desc')->get(),
         'featured_categories' => Category::Where('status' , '1')->orderBy('id','desc')->get(),
         'brands' => Brand::orderBy('id','desc')->get(),
         'slider_uppers' => Slider::where('upper' , '1')->orderBy('id','desc')->get(),
         'slider_lowers' => Slider::where('lower' , '3')->orderBy('id','desc')->get(),


    ]);

    }

    public function newarrivalProductList(){
     if(request()->short == 'new-first'){
          $products = Product::where('new_arrival',1)->orderBy('created_at', 'desc');
      }else if(request()->short == 'low-to-high'){
          $products = Product::where('new_arrival',1)->orderBy('price', 'asc');
      }else if(request()->short == 'high-to-low'){
          $products = Product::where('new_arrival',1)->orderBy('price', 'desc');
      }else{
          $products = Product::where('new_arrival',1)->orderBy('created_at', 'desc');
      }

      $products = $products->paginate(request()->pagination ?? '20');
    	return view('frontend.single_page.newarrivals',[
                'products' => $products,
                'categories' => Category::orderBy('id','desc')->get(),
                'sub_categories' => SubCategory::orderBy('id','desc')->get(),
                'brands' => Brand::orderBy('id','desc')->get(),
    	]);
    }

    public function newarrivalProductListShort(Request $request){
     // return ($cat_product)->toArray();
     return view('frontend.single_page.newarrivals',[

        'products' => Product::where('new_arrival',1)->orderBy('id','desc')->paginate($request->pagination),
        'categories' => Category::orderBy('id','desc')->get(),
        'cat_name' => Category::orderBy('id','desc')->where('id',$id)->first(),

        'sub_categories' => SubCategory::orderBy('id','desc')->get(),
        'brands' => Brand::orderBy('id','desc')->get(),
     ]);
}

    public function productDetails($slug){

           $product = Product::where('slug',$slug)->first();
           $sub_image = ProductSubImage::where('product_id' , $product->id)->get();
           $product_size = ProductSize::select('size_id')->where('product_id', $product->id)->groupBy('size_id')->get();
        $productcount = ProductSize::select('size_id',DB::raw('count(*) as sizecount'))->where('product_id', $product->id)->groupBy('size_id')->get();

           $all_products = Product::orderBy('id','desc')->get();
           $product_measurments = ProductMeasurement::where('product_id',$product->id)->get();

           return view('frontend.product-details',[
                'product' => $product,
                'sub_images' => $sub_image,
                'product_sizes' =>  $product_size,
                'categories' => Category::orderBy('id','desc')->get(),
                'brands' => Brand::orderBy('id','desc')->get(),
                'all_products' => $all_products,
                'productcount' =>$productcount,
                'product_measurments' => $product_measurments,
           ]);
    }


    public function compare(Request $request)
    {

        $ids=$request->input('cpid');
        $request->session()->put('ids', $ids);

   return  redirect()->route('compare.display')->with( ['ids' => $ids] );


    }
    public function display()
    {

        $categories = Category::latest()->where('status',1)->get();

        $vals=Session::keep('ids');




        return view('frontend.compare',['ids'=>$vals,'categories' => Category::orderBy('id','desc')->get(),
        'brands' => Brand::orderBy('id','desc')->get(),]);



    }


    public function checkCoupon(Request $request){
        $coupon_code    =   $request->coupon_code;
        $product_id     =   $request->product_id;
       // Session::put('coupon', []);

        $coupon         =   Coupon::where('coupon_code',$coupon_code)->first();
        if(!$coupon){
            if (collect(Session::get('coupon'))->where('product_id', $product_id)->first()){
                return remove_from_coupon_session($product_id);
            }else{
                return response()->json( ['error' => 'Invalid Coupon']);
            }
        }else{
            $invalid_coupon = null;
            //check user
            if($coupon->users!="all"){
            if (!in_array(auth()->user()->email ?? '', explode(",",$coupon->users))){
                //return response()->json( ['error' => 'Coupon is not for you']);
                $invalid_coupon = true;
            }
            }

            //check product
            if (!in_array($product_id, explode(",",$coupon->products))){
                //return response()->json( ['error' => 'Coupon is not for this product']);
                $invalid_coupon = true;
            }

            //check status
            if ($coupon->status != 1){
                //return response()->json( ['error' => 'Coupon is not activated']);
                $invalid_coupon = true;
            }

            //check expire date
            if (!Carbon::parse($coupon->expiry_date)->format('Y-m-d') >= Carbon::today()){
                //return response()->json( ['error' => 'In Valid Date']);
                $invalid_coupon = true;
            }

            //check multi time or single time || Multiple Times | Single Times
            if ($coupon->coupon_type == 'Single Times' && OrderDetail::where('coupon_id', $coupon->id)->where('customer_id', auth()->user()->id ?? '')->first()){
                //return response()->json( ['error' => 'Coupon already used']);
                $invalid_coupon = true;
            }

            if($invalid_coupon){
                if (collect(Session::get('coupon'))->where('product_id', $product_id)->first()){
                    return remove_from_coupon_session($product_id);
                }else{
                    return response()->json( ['error' => 'Invalid Coupon']);
                }
            }

            if (!Session::get('coupon')){
                Session::put('coupon', []);
            }

            if(!collect(Session::get('coupon'))->where('product_id', $product_id)->first()){
                Session::push('coupon', array('coupon_id' => $coupon->id, 'product_id' => $product_id));
            }

            $s = Session::get('coupon');
            //After all condition check this coupon is valid
            if($coupon->amount_type == 'Percentage'){
                $message = $coupon->amount.' % OFF';
            }else{
                $message = $coupon->amount.' BDT OFF';
            }
            return response()->json( ['success' => $message, 'session' => $s,'coupon'=>$coupon_code]);
        }
    }
}
