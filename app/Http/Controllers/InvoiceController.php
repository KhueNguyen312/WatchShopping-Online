<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Product;
use App\InvoiceDetail;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function getListInvoices()
    {
        $invoices = Invoice::orderBy("id", "DESC")->get();
        return view('admin.invoice.list', compact('invoices'));
    }

    public function getInvoice($id)
    {
        $invoiceDetail = InvoiceDetail::where('order_id', $id)->get();
        $invoice = Invoice::find($id);
        return view('admin.invoice.invoice', compact('invoice', 'invoiceDetail'));
    }

    public function generatePDF($id)
    {
        ini_set('max_execution_time', 180);
        $content = ['title' => 'Invoice'];
        $html = $this->convertDataToHTML($id);
        $pdfFile = PDF::loadHTML($html);
        return $pdfFile->stream();
    }


    public function convertDataToHTML($id)
    {
        $invoiceDetail = InvoiceDetail::where('order_id', $id)->get();
        $invoice = Invoice::find($id);
        $output = "<div class=\"wrapper\"> <section class=\"invoice \">
            <!-- title row -->
            <div class=\"row\">
                <div class=\"col-xs-12\">
                    <h2 class=\"page-header\">
                        <i class=\"fa fa-globe\"></i> VenRom, Inc.
                        <small class=\"pull-right\">Date: {date(\"Y-m-d\")}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class=\"row invoice-info\">
                <div class=\"col-sm-4 invoice-col\">
                    From
                    <address>
                        <strong>VenRom, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (804) 123-5432<br>
                        Email: Venrom@gmail.com
                    </address>
                </div>
                <!-- /.col -->
                <div class=\"col-sm-4 invoice-col\">
                    To
                    <address>
                        <strong>{$invoice->receiver}</strong><br>
                        {$invoice->billing_address}<br>
                        Phone: {$invoice->phone}<br>
                        Email: {$invoice->email}
                    </address>
                </div>
                <!-- /.col -->
                <div class=\"col-sm-4 invoice-col\">
                    <b>Invoice #{$invoice->id}</b><br>
                    <br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class=\"row\">
                <div class=\"col-xs-12 table-responsive\">
                    <table class=\"table table-striped\">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>";
        $subtotal = 0;
        foreach ($invoiceDetail as $i => $detail)
            $output .= "<tr>
                            <td>{++$i.'.'}</td>
                            <td>{$detail->product->name}</td>
                            <td>{$detail->qty}</td>
                            <td>{$detail->detail_price}</td>
                            <?php $subtotal += $detail->detail_price ?>
                        </tr>";

        $output .= "</tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <div class=\"col-xs-6\"></div>
                <!-- /.col -->
                <div class=\"col-xs-6\">

                    <div class=\"table-responsive\">
                        <table class=\"table\">
                            <tr>
                                <th style=\"width:50%\">Subtotal:</th>
                                <td>$ {{$subtotal}}</td>
                            </tr>
                            <tr>
                                <th>Discount:</th>";
        if (isset($invoice->coupon))
            $output .= "<td>{
            $invoice->coupon->type == 0 ? \"%\".$invoice->coupon->value:\"$\".$invoice->coupon->value}</td>";
        else
            $output .= "<td>$0</td>";

        $output .= "</tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>$15</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>$ {
                $invoice->total}</td>
                            </tr>
                        </table>
                    </div>
                </div>
        </section> </div>";
        return $output;
    }

    public function getListInvoiceDetail($id)
    {
        $invoiceDetail = InvoiceDetail::where('order_id', $id)->get();
        $invoice = Invoice::find($id);
        return view("admin.invoice.invoice_detail_list", compact('invoice', 'invoiceDetail'));
    }
    public function changeInvoiceStatus(Request $request) {
        if ($request->ajax()) {
            $id = $request->id;
            $invoice = Invoice::find($id);
            $invoice->status = 1;
            $invoice->save();
        }
    }
}
