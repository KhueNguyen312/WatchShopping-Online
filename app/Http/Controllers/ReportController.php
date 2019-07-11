<?php

namespace App\Http\Controllers;

use App\Invoice;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getReport(){
        return view('admin.report.sale');
    }
    public function showDetail(Request $request){
        $start = $request->start;
        $end = $request->end;
//        $report2 = DB::select(DB::raw($sql));
//        $test = DB::table('order')->whereDate('order_date','>',$start)->get();
//        dd($test);
        $report = DB::table('order')->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('product','product.id','=','order_detail.product_id')
            ->select('product.id', 'product.name as name',DB::raw('sum(order_detail.qty) as qty'),DB::raw('(product.price*sum(order_detail.qty) - sum(order_detail.detail_price) )as discount'),
                DB::raw('sum(order_detail.detail_price) as totalprice'))->whereDate('order_date','>=',$start)->whereDate('order_date','<=',$end)->where('order.status','=',1)
            ->groupBy('product.id','name','qty','discount','product.price')->get();
//        dd($report);
        $result = "";
        $qty = 0;
        $dis = 0;
        $total = 0;
        foreach ($report as $i =>$detail){
            ++$i;
            $qty += $detail->qty;
            $dis += $detail->discount;
            $total += $detail->totalprice;
            $result .= "<tr>
                                    <td>{$i}.</td>
                                    <td>{$detail->name}</td>
                                    <td>{$detail->qty}</td>
                                    <td>{$detail->discount}</td>
                                    <td>{$detail->totalprice}</td>
                                </tr>";
        }
        $msg="<tr>
              <th>Total</th>
              <th>#</th>
              <th>$qty</th>
              <th>$dis</th>
              <th>$total</th>
               </tr>";
        $invoice = Invoice::where('order_date','>=',$start)->where('order_date','<=',$end)->where('order.status','=',1)
            ->get();
        $reveneu = 0;
        foreach ($invoice as $detail){
            $reveneu += $detail->total;
        }
        $disOnInvoice = $total - $reveneu;
        echo json_encode(array($result,$msg,$reveneu,round($disOnInvoice),2));
    }

}
