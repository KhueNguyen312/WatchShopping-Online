<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use Validator;

class CouponController extends Controller
{

    public function checkCoupon(Request $request){
        $code = $request->code;

        $coupon = Coupon::where('code',$code)->first();
        if($coupon!=null){
            $currentDate = date("Y-m-d");
            if($coupon->startdate > $currentDate || $coupon->enddate < $currentDate){
                $msg ="not available";
            }else
            {
                $msg="applied";
                session()->put('coupon',[
                    'id' => $coupon->id,
                    'name' => $coupon->code,
                    'type' => $coupon->type,
                    'discount' => $coupon->value,
                    ]);
            }
        }else{
            $msg="not exist";

        }

        echo $msg;
    }
    public function removeCoupon(){
        session()->forget('coupon');
    }
    public function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function getListCoupon(){
        $coupons = Coupon::orderBy("id","DESC")->get();
        return view('admin.coupon.list',compact('coupons'));
    }
    public function getForm($id) {
        if ($id == 0) {
            return view("admin.coupon.form");
        } else {
            $coupon = Coupon::find($id);
            return view("admin.coupon.form",compact('coupon'));
        }
    }
    public function createOrUpdateCoupon($id,Request $request){
        $messages = [
            'type.required' => 'Choose type.',
            'value.required' => 'enter value.',
            'startdate.required' => 'enter value.',
            'enddate.required' => 'enter value.'
        ];
        $rules = [
            'type' => 'required',
            'value' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('ad.coupon.form.get', [$id])
                ->withErrors($errors)
                ->withInput();
        }

        if ($id == 0) {
            $coupon = Coupon::create([
                'code' => $this->generateRandomString(),
                'type' => $request->type,
                'value' => $request->value,
                'startdate'=> $request->startdate,
                'enddate' => $request->enddate
            ]);
            return redirect()->route('ad.coupon.form.get',[$id])->with('success','Data added successfully.');
        }
        else {
            Coupon::findOrFail($id)->update($request->all());
            return redirect()->route('ad.coupon.form.get',[$id])->with('success','Updated successfully.');
        }
    }
}
