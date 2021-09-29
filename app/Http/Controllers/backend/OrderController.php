<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shipping;
use App\Model\Payment;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Product;
use App\Model\ProductSize;
use DB;
use PDF;
use Mail;
use App\User;

class OrderController extends Controller
{
   
   public function pendingList(){
       
        $order = Order::where('status','0')->get();
        return view('backend.order.pending-list',[
            'orders' => $order
         ]);
   }

   public function approveList(){
        $order = Order::where('status','1')->orderBy('order_no','desc')->get();
        return view('backend.order.approve-list',[
            'orders' => $order
        ]);
   }

   public function details($id){
      
       $order = Order::findOrFail($id);
                                      $ordernum = Order::where('user_id',$order->user_id)->count();

      return view('backend.order.order-details' , [
          'order' =>  $order,
                              'ordernum' =>  $ordernum,

      ]);
   }

    public function approve($id){
   
       $order = Order::findOrFail($id);
       $order->status = '1';
       $order->selling_date = Date('Y-m-d');
       $order->save();

       $order_details = OrderDetail::where('order_id' , $order->id)->get();
       foreach( $order_details as  $order_detail) {
            $product = new Product();
            $order_qty = OrderDetail::select('quantity')->where('product_id' , $order_detail->product_id)->first();
            $product_qty = Product::select('qty')->where('id' , $order_detail->product_id)->first();
            $qty =  ((float)$product_qty->qty) -  ((float)$order_qty->quantity);
           
            DB::table('products')
            ->where('id' , $order_detail->product_id)
            ->update(['qty' => $qty]);
            
                    ProductSize::where('product_id' , $order_detail->product_id)->where('size_id' , $order_detail->size_id)->limit($order_qty->quantity)->delete();

            
       }
       
       /* $email = User::select('email')->where('id', $order->user_id)->first(); 

         $data = array(
                 'order' => $order,
                 'email' => $email,
             );
                


         Mail::send('backend.pdf.order-details-pdf',$data,function($message) use($data){

                 $message->from('mail@nashrava.co','Nashrava');
                 $message->to($data['email']->email);
                $message->subject('Your Order has approved');   


             });*/

       return redirect()->route('order.approve.list')->with('success','Order Complete Successfully');
   }

    public function orderReportPrint($id)
    {
        $data['order'] = Order::findOrFail($id);
        $pdf = PDF::loadView('backend.pdf.order-details-pdf', $data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        OrderDetail::where('order_id', $order->id)->delete();
        Payment::where('id', $order->payment_id)->delete();
        $order->delete();
        return redirect()->route('order.pending.list')->with('success','Order Cancelled Successfully');
    }
    
     public function invoiceReport(){
       return view('backend.order.selling-report');
    }
    
     public function invoiceReportPrint(Request $request){
         
        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        $invoice_data['daily_invoice_report'] = Order::whereBetween('selling_date',[$start_date,$end_date ])->where('status','1')->orderBy('created_at')->get();
        $invoice_data['start_date'] = date('Y-m-d',strtotime($request->start_date));
        $invoice_data['end_date'] =  date('Y-m-d',strtotime($request->end_date));

        $pdf = PDF::loadView('backend.pdf.daily-selling-report', $invoice_data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
         
     }
}
