<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Product;
use App\InvoiceDetail;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function getListInvoices(){
        $invoices = Invoice::orderBy("id","DESC")->get();
        return view('admin.invoice.list',compact('invoices'));
    }

    public function getListInvoiceDetail($id) {
        $invoiceDetail = InvoiceDetail::where('order_id', $id)->get();
        $invoice = Invoice::find($id);
        return view("admin.invoice.invoice_detail_list",compact('invoice','invoiceDetail'));
    }
}
