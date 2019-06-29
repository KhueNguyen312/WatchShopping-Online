<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    function  checkOut(){
        return view('index.checkout.checkout');
    }
    function  ordered(Request $request){
        $cart = session()->get('cart');
        if($cart){
            $total = 0;
            foreach ($cart as $item){
                $total += $item["price"]*$item["quantity"];
            }
            $invoice = Invoice::create([
                'receiver' => $request->name,
                'billing_address' => $request->address." ".$request->city." ".$request->country,
                'email' => $request->email,
                'phone' => $request->phone,
                'total' => $total
            ]);
            foreach($cart as $product) {
                $invoice->invoiceDetail()->create([
                    'product_id' => $product['id'],
                    'detail_price' => $product['price']*$product['quantity'],
                    'qty' => $product['quantity'],
                ]);
            }
            session()->forget('cart');
        }
        return view('index.checkout.ordered');
    }
}
