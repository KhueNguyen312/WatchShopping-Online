<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeValue;
use App\Brand;
use App\Product;
use App\ProductAttribute;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{

    public function getListProducts(){
        $products = Product::orderBy("id","DESC")->get();
        return view('admin.product.list',compact('products'));
    }

    public function getForm($id) {
        $brands = Brand::all();
        if ($id == 0) {
            return view("admin.product.form",compact('brands'));
        } else {
            $product = Product::find($id);
            return view("admin.product.form",compact('product'),compact('brands'));
        }
    }
    public function createOrUpdateProduct($id,Request $request){
        $messages = [
            'name.required' => 'Enter value.'
        ];
        $rules = [
            'name' => 'required',
            'brand_id'=>'required',
            'price' => 'required',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('ad.product.form.get', [$id])
                ->withErrors($errors)
                ->withInput();
        }
        if ( ! $request->has('status')) {
            $request->merge([
                'status' => 1,
            ]);
        }
        else{
            $request->merge([
                'status' => 0,
            ]);
        }
        if ($id == 0) {
            $product = Product::create($request->all());
            return redirect()->route('ad.product.form.get',[$id])->with('success','Data added successfully.');
        }
        else {
            Product::findOrFail($id)->update($request->all() );

            return redirect()->route('ad.product.form.get',[$id])->with('success','Updated successfully.');
        }
    }
    public function getDetailForm($id) {
        $attributes = Attribute::all();
        $attValues = AttributeValue::all();
        $productDetail = ProductAttribute::where('product_id', $id)->get();
        $product = Product::find($id);
        return view("admin.product.product_detail_form",compact('product','attributes','attValues','productDetail'));
    }
    public function addProductAttribute($id,Request $request){
        $messages = [
            'att.required' => 'Choose attribute.',
            'att_value.required' => 'Choose value.'
        ];
        $rules = [
            'att' => 'required',
            'att_value'=>'required',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('ad.product.detailForm.get', [$id])
                ->withErrors($errors)
                ->withInput();
        }

        $productAttribute = new ProductAttribute;
        $productAttribute->att_value_id = $request->input('att_value');
        $productAttribute->product_id = $id;
        $productAttribute->save();
        return redirect()->route('ad.product.detailForm.get',[$id])->with('success','Data added successfully.');
    }

    public function removeAttribute($id){
        $productAttribute = ProductAttribute::findOrFail($id);
        $productAttribute->delete();
        return Response()->json($productAttribute);
    }

    public function changeStatus(Request $request){
        $id = $request->id;
        $product = Product::findOrFail($id);
        $product->status = 1;
        $product->save();
    }
}
