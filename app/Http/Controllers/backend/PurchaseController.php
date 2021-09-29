<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Unit;
use App\Model\Purchase;
use App\User;
use Auth;
use DB;
use PDF;
class PurchaseController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.purchase.index',[ 
            'purchase_info' => Purchase::orderBy('purchase_date','desc')
                               ->orderBy('id','desc')
                               ->get()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.purchase.create',[
            'suppliers' => Supplier::all(),
            'categories' => Category::all(),
            'units' => Unit::all(),
            'purchase_info' => Purchase::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // return $request->all();
       if($request->category_id == null){
                return redirect()->back()->with('error','Sorry! You did not select any item');
              }else{
                   $count_category = count($request->category_id);
                   for($i = 0; $i < $count_category; $i++){
                      $purchase = new Purchase();
                      $purchase->category_id = $request->category_id[$i];
                      $purchase->product_name = $request->product_name[$i];
                      $purchase->purchase_no = $request->purchase_no[$i];
                      $purchase->purchase_date = date('Y-m-d',strtotime($request->purchase_date[$i]));

                      $purchase->buying_qty = $request->buying_qty[$i];
                      $purchase->unit_price = $request->unit_price[$i];
                      $purchase->buying_price = $request->buying_price[$i];
                      $purchase->status = '1';
                      $purchase->created_by = Auth::user()->id;
                      $purchase->save();

              

                   }
              }
              return redirect()->route('purchase.index')->with('success','Purchase data saved successfully');
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
       return view('backend.purchase.edit',[
            'purchase' => Purchase::findOrFail($id),
            'suppliers' => Supplier::orderBy('id','desc')->get(),
            'categories' => Category::orderBy('id','desc')->get(),
            'products' => Product::orderBy('id','desc')->get(),
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
           'purchase_no' => 'required',
           'supplier_id' => 'required',
           'category_id' => 'required',
           'purchase_date' => 'required',
           'buying_qty' => 'required',
           'unit_price' => 'required',
        ]);

        $purchase = Purchase::findOrFail($id);
        $purchase->purchase_no = $request->purchase_no;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->category_id = $request->category_id;
        $purchase->purchase_date = date('Y-m-d',strtotime($request->purchase_date));
        $purchase->buying_qty = $request->buying_qty;
        $purchase->unit_price = $request->unit_price;
        $purchase->save();
         

        $product = Product::where('product_name',$request->product_id)->first();
        $product->qty = $request->buying_qty;
        $product->save();

        return redirect()->route('purchase.index')->with('success','purchase update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase_info = Purchase::findOrFail($id);
        if($purchase_info->delete()){
        return redirect()->route('purchase.index')->with('success','Purchase Deleted Successfully');
        }

    }

    
    public function purchaseReports(){
      return view('backend.purchase.purchase-report');
    }

    public function purchaseDailyReport(Request $request){
        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        $purchase_data['daily_purchase_report'] = Purchase::whereBetween('purchase_date',[$start_date,$end_date ])->where('status','1')->orderBy('category_id')->orderBy('purchase_date')->get();
        $purchase_data['start_date'] = date('Y-m-d',strtotime($request->start_date));
        $purchase_data['end_date'] =  date('Y-m-d',strtotime($request->end_date));

        $pdf = PDF::loadView('backend.pdf.daily-purchase-report-pdf', $purchase_data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

}
