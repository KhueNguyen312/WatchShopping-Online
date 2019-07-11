<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Invoice;
use App\Product;
use Auth;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    function  checkOut(){
        return view('index.checkout.checkout');
    }
    function  ordered(Request $request){
        $customer_id = null;
        if(Auth::guard('user')->user() != null){
            $customer_id = Auth::guard('user')->user()->id;
        }
        $shipCost = 15;
        $cart = session()->get('cart');
        if($cart){
            $total = 0;
            $code_id = null;
            foreach ($cart as $item){
                $total += $item["price"]*$item["quantity"];
            }
            if(session()->get('coupon')){
                $discount = session()->get('coupon')["discount"];
                $code_id = session()->get('coupon')["id"];
                if(session()->get('coupon')["type"] == 0)
                    $total = $total*((100-$discount)/100) + $shipCost;
                else
                    $total = $total- $discount + $shipCost;
                $coupon = Coupon::find($code_id);
                $coupon->status = 1;
                $coupon->save();
            }
            $invoice = Invoice::create([
                'receiver' => $request->name,
                'customer_id' => $customer_id,
                'billing_address' => $request->address." ".$request->city." ".$request->country,
                'email' => $request->email,
                'phone' => $request->phone,
                'ship_cost' => $shipCost,
                'coupon_id' => $code_id,
                'total' => $total
            ]);
            foreach($cart as $product) {
                $invoice->invoiceDetail()->create([
                    'product_id' => $product['id'],
                    'detail_price' => ($product['price']*$product['quantity']),
                    'qty' => $product['quantity'],
                ]);

            }

            session()->forget('cart');
            session()->forget('coupon');
        }
        return view('index.checkout.ordered');
    }
}
