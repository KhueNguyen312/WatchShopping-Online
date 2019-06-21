<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Validator;

class BrandController extends Controller
{
    public function getListBrands(){
        $brands = Brand::orderBy("id","DESC")->get();
        return view('admin.brand.list',compact('brands'));
    }
    public function getForm($id) {
        if ($id == 0) {
            return view("admin.brand.form");
        } else {
            $brand = Brand::find($id);
            return view("admin.brand.form",compact('brand'));
        }
    }
    public function createOrUpdateBrand($id,Request $request){
        $messages = [
            'name.required' => 'Enter value.'
        ];
        $rules = [
            'name' => 'required',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('ad.brand.form.get', [$id])
                ->withErrors($errors)
                ->withInput();
        }

        if ($id == 0) {
            $brand = Brand::create($request->all());
            return redirect()->route('ad.brand.form.get',[$id])->with('success','Data added successfully.');
        }
        else {
            Brand::findOrFail($id)->update($request->all() );
            return redirect()->route('ad.brand.form.get',[$id])->with('success','Updated successfully.');
        }
    }
}
