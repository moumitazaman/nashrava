<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use File;
use App\Model\InvoiceCustomer;
use App\Model\Invoice_Payment;
use App\Model\Invoice_payment_Detail;
use Auth;
class CustomerController extends Controller
{
    public function index(){
       
        $cus_info = User::where('user_type','customer')->where('status','1')->get();
        return view('backend.customer.index',[
            'cus_info' => $cus_info
        ]);
    }

    public function draftView(){
        $draft_cus = User::where('user_type','customer')->where('status','0')->get();
        return view('backend.customer.draft-customers',[
            'draft_customer' => $draft_cus
        ]);
    }

    public function delete($id){
       
        $draft_customer = User::findOrFail($id);
            if ($draft_customer->image != null){
                 $this->deleteFile($draft_customer->image);
            } 
        $draft_customer->delete(); 
        return redirect()->route('draft.customer')->with('success','Data Deleted successfully');
   }

    private function deleteFile($path){
        File::delete($path);
    }

    public function localCustomer(){
         
         return view('backend.customer.local-customer',[
               
                 'invoice_customers' => InvoiceCustomer::orderBy('id','desc')->get(),
            ]);
    }

    public function localDelete($id){
       
        $local_customer = InvoiceCustomer::findOrFail($id);
            if ($local_customer->image != null){
                 $this->deleteFile($local_customer->image);
            } 
        $local_customer->delete(); 
        return redirect()->route('local.customer')->with('success','Data Deleted successfully');
   }

   public function localCustomerDue(){
    $payment = Invoice_Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.customer.local-customer-due-list',[
                     
            'payments' => $payment
        ]);
   }

   public function editInvoice($invoice_id){
            $payment = Invoice_Payment::where('invoice_id',$invoice_id)->first();

            return view('backend.customer.invoice-edit',[
                    'payment' => $payment,
                    'selling_date' => Date('d-m-Y')
            ]);
    }

     public function updateInvoice(Request $request, $invoice_id){
        
        if($request->new_paid_amount < $request->paid_amount){
           return redirect()->back()->with('error','Sorry! you entered paid amount is greater than due amount');
        }else{
            $payment = Invoice_Payment::where('invoice_id',$invoice_id)->first();
            $paymentDetail = new Invoice_payment_Detail();
            $payment->paid_status = $request->paid_status;
            $paymentDetail->payment_type = $request->payment_type;
            if($request->paid_status == 'full_paid'){
               $payment->paid_amount = $payment->paid_amount + $request->new_paid_amount;
               $payment->due_amount = '0';
               $paymentDetail->current_paid_amount =  $request->new_paid_amount; 
            }elseif($request->paid_status == 'partial_paid'){
               $payment->paid_amount = $payment->paid_amount + $request->paid_amount;
               $payment->due_amount =  $payment->due_amount - $request->paid_amount;
               $paymentDetail->current_paid_amount =  $request->paid_amount; 
            }

            $payment->save();
            $paymentDetail->invoice_id =  $invoice_id;
            $paymentDetail->date = date('Y-m-d',strtotime($request->date));
            $paymentDetail->updated_by = Auth::user()->id;
            $paymentDetail->save();
            return redirect()->route('local.customer.due.list')->with('success','Invoice Successfully Updated');

        }
    }


}
