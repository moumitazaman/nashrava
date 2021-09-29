<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use PDF;
use App\Model\Purchase;

class StockController extends Controller
{
    public function index(){
    	return view('backend.stock.index',[
               
            'stock_info' => Product::orderBy('id','desc')->where('status', '1')->get()

    	]);
    }

    public function edit($id){

	    $product_qty = Product::findOrFail($id);
	    return view('backend.stock.stock-edit',[
	       'product_qty' => $product_qty 
	    ]);
    }

    public function update(Request $request , $id){
        $this->validate($request,[
             'qty' => 'required',
        ]);

        $product_stock = Product::findOrFail($id);
        $product_stock->qty = $request->qty;
        if($product_stock->save()){

            $purchase_stock = Purchase::where('id',$product_stock->product_name)->first();
            $purchase_stock->buying_qty = $request->qty;
            $purchase_stock->save();
        	return redirect()->route('stock.index')->with('success','Stock Updated Successfully');
        } else {
        	return redirect()->back()->with('error','Sorry! Stock Does not Updated Successfully');
        }
      



    }

    public function stockReport() {
        return view('backend.stock.stock-report',[
            'stock_info' => Product::orderBy('category_id','asc')->get()
        ]);
    }
    
    
    public function stockReportPrint()
    {

        $data['stock_info'] = Product::orderBy('category_id','asc')->get();
        $pdf = PDF::loadView('backend.pdf.product-stock-pdf', $data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }



}
