<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Invoice;
use App\Model\Category;
use App\Model\InvoiceCustomer;
use App\User;
use Auth;
use App\Model\Customer;
use App\Model\Purchase;
use DB;
use Cart;
use PDF;
use App\Model\InvoiceDetail;
use App\Model\Invoice_Payment;
use App\Model\Invoice_Payment_Detail;
use App\Model\ShippingCost;
use App\Model\Product; 


class InvoiceController extends Controller
{
    
    public function index()
    {
       

         return view('backend.invoice.index',[
                
            'invoice_info' => Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get()
        ]);
    }



   
    public function create()
    {
        $invoice = Invoice::orderBy('id','desc')->first();
        if($invoice == null){
            $firstReg = '0';
            $invoice_no = $firstReg + 1;
        }else{
          $invoice = Invoice::orderBy('id','desc')->first()->invoice_no;
          $invoice_no = $invoice + 1;  
        }
        return view('backend.invoice.create',[
            
            'categories' => Category::all(),
            'invoice_no' => $invoice_no,
            'selling_date' => date('Y-m-d'),
            'customers' => InvoiceCustomer::all(),
            'shipping_area' => ShippingCost::all(),

        ]);
    }

   
    public function store(Request $request)
    {
       if($request->product_id == null) {
                return redirect()->back()->with('error','Sorry! you do not select any product'); 
        } else {
            if($request->paid_amount > $request->estimated_amount) {
                return redirect()->back()->with('error','Sorry! you entered paid amount is greater than total amount'); 
            } else {

                $invoice = new Invoice();
                $invoice->invoice_no = $request->invoice_no;
                $invoice->date = date('Y-m-d',strtotime($request->date));
                $invoice->chalan_no = $request->chalan_no;
                $invoice->status = '0';
                $invoice->created_by = Auth::user()->id;
                $invoice->save();
                DB::transaction(function() use($invoice,$request){
                    if($invoice->save()){
                        $count_category = count($request->category_id);

                        for($i = 0; $i < $count_category; $i++){
                          $invoice_details = new InvoiceDetail();
                          $invoice_details->date = date('Y-m-d',strtotime($request->date));
                          $invoice_details->invoice_id = $invoice->id;
                          $invoice_details->category_id = $request->category_id[$i];
                          $invoice_details->product_id = $request->product_id[$i];
                          $invoice_details->selling_qty = $request->selling_qty[$i];
                          $invoice_details->unit_price = $request->unit_price[$i];
                          $invoice_details->selling_price = $request->selling_price[$i];
                          $invoice_details->description = $request->description;
                       
                          $invoice_details->status = '0';
                          $invoice_details->save();

                          $product = Product::where('product_name' , $request->product_id[$i])->first();
                          $product->qty =  ((float)$product->qty) - ((float)$request->selling_qty[$i]);
                          $product->save();
                        }

                        if($request->customer_id == '0'){
                           $customer = new InvoiceCustomer(); 
                           $customer->customer_name = $request->customer_name;
                           $customer->mobile_no = $request->mobile_no;
                           $customer->address = $request->address;
                           $customer->save();
                           $customer_id = $customer->id;
                        }else {
                           $customer_id = $request->customer_id;
              
                        }

                        $payment = new Invoice_payment();
                        $payment_details = new Invoice_Payment_Detail();
                        $payment->invoice_id = $invoice->id;
                        $payment->customer_id = $customer_id;
                        $payment->paid_status = $request->paid_status;
                        $payment->total_amount = $request->estimated_amount;
                        $payment->discount_amount = $request->discount_amount;
                        $payment->date = date('Y-m-d',strtotime($request->date));
                        $payment->vat = $request->vat;
                        if($request->paid_status == 'full_paid'){
                          
                            $payment->paid_amount = $request->estimated_amount;
                            $payment->due_amount = '0';
                            $payment_details->current_paid_amount = $request->estimated_amount;
                           

                            
                        } elseif($request->paid_status == 'full_due'){
                         
                            $payment->paid_amount = '0';
                            $payment->due_amount = $request->estimated_amount;
                            $payment_details->current_paid_amount = '0';
                           
                        } elseif($request->paid_status == 'partial_paid'){
                            $payment->paid_amount = $request->paid_amount;
                            $payment->due_amount = $request->estimated_amount - $request->paid_amount;
                            $payment_details->current_paid_amount = $request->paid_amount;
                          
                        }

                        $payment->save();
                        $payment_details->invoice_id = $invoice->id;
                        $payment_details->date = date('Y-m-d',strtotime($request->date));
                        $payment_details->payment_type = $request->payment_type;
                        $payment_details->save();
                    }    
                });
            }
        }
        Cart::destroy();
         return view('backend.invoice.invoice-approve',[
                 'invoice' => Invoice::with(['invoiceDetails'])->findOrFail($invoice->id),
                 // 'previous_dues' => Payment::select('due_amount')->where('customer_id',$request->customer_id)->get(),
        ]);
    }

  
    public function destroy($id)
    {
       $invoice = Invoice::findOrFail($id);
       $invoice->delete();
       InvoiceDetail::where('invoice_id',$invoice->id)->delete();
       Payment::where('invoice_id',$invoice->id)->delete();
       PaymentDetail::where('invoice_id',$invoice->id)->delete();
       return redirect()->route('invoice.pending.list')->with('success','Invoice Deleted Successfully');
    }


    public function pendingList(){
      
       return view('backend.invoice.view-pending-list',[   
            'invoice_info' => Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get()
        ]);  
    }

    public function approve($id){
    
        return view('backend.invoice.invoice-approve',[
                 'invoice' => Invoice::with(['invoiceDetails'])->findOrFail($id)
        ]);
    }

    public function approvalStore(Request $request,$id){
        foreach($request->selling_qty as $k => $val){
            $invoice_details = InvoiceDetail::where('id',$k)->first();
            $product = Purchase::where('id',$invoice_details->product_id)->first();
            if($product->buying_qty < $request->selling_qty[$k]){
                return redirect()->back()->with('error','Sorry! You approve maximum value');
            }
        }

        $invoice = Invoice::findOrFail($id);
        $invoice->approved_by = Auth::user()->id;
        $invoice->status = '1';

    DB::transaction(function() use($request,$invoice,$id){
        foreach($request->selling_qty as $k => $val){
        $invoice_details = InvoiceDetail::where('id',$k)->first();
        $invoice_details->status = '1';
        $invoice_details->save();
        $product = Purchase::where('id',$invoice_details->product_id)->first();
        // $product->buying_qty = ((float)$product->buying_qty) - ((float) $request->selling_qty[$k]);
        $product->save();
        }
        $invoice->save(); 
    });
      
     return redirect()->route('invoice.index')->with('success','Invoice approved successfully');
    }

    public function printInvoice($id){
        $data['invoice'] = Invoice::with(['invoiceDetails'])->findOrFail($id);
       
       
        $pdf = PDF::loadView('backend.invoice.pdf-individual', $data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function dailyReport(){
          return view('backend.invoice.invoice-daily-report');
    }

    public function dailyReportPdf(Request $request){
        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        $invoice_data['daily_invoice_report'] = Invoice::whereBetween('date',[$start_date,$end_date ])->where('status','1')->get();
        $invoice_data['start_date'] = date('Y-m-d',strtotime($request->start_date));
        $invoice_data['end_date'] =  date('Y-m-d',strtotime($request->end_date));

        $pdf = PDF::loadView('backend.pdf.daily-invoice-report-pdf', $invoice_data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
