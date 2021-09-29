<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Invoice;
use PDF;
use File;
use App\User;
use Auth;
use App\Model\Invoice_Payment;

class LocalInvoiceController extends Controller
{
    public function localInvoiceReport() {
          
          return view('backend.invoice.invoice-report');
    }

    public function localInvoiceReportPrint(Request $request) {
          
        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        $invoice_data['daily_invoice_report'] = Invoice::whereBetween('date',[$start_date,$end_date ])->where('status','1')->orderBy('date')->get();
        $invoice_data['start_date'] = date('Y-m-d',strtotime($request->start_date));
        $invoice_data['end_date'] =  date('Y-m-d',strtotime($request->end_date));

        $pdf = PDF::loadView('backend.pdf.daily-invoice-report-pdf', $invoice_data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function dueReport() {
         return view('backend.customer.customer-report');
    }

    public function customerdueReportPrint(Request $request) {

        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        $invoice_data['daily_customer_due_report'] = Invoice_Payment::whereIn('paid_status',['full_due','partial_paid'])->whereBetween('date',[$start_date,$end_date ])->get();
   
        $invoice_data['start_date'] = date('Y-m-d',strtotime($request->start_date));
        $invoice_data['end_date'] =  date('Y-m-d',strtotime($request->end_date));

        $pdf = PDF::loadView('backend.pdf.customer-credit-pdf', $invoice_data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
    
}
