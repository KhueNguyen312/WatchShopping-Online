<?php
/**
 * Created by PhpStorm.
 * User: stari
 * Date: 4/12/2019
 * Time: 1:32 AM
 */

namespace App\Http\Controllers;


use App\Attribute;
use App\AttributeValue;
use Illuminate\Http\Request;
use Validator;

class AdminAttributeController extends Controller
{
    public function getForm($id) {
        if ($id == 0) {
            return view("admin.attribute.attribute_form");
        } else {
            $attribute = Attribute::find($id);
            return view("admin.attribute.attribute_form",compact('attribute'));
        }
    }
    public function createOrUpdateObj($id, Request $request) {
        $messages = [
            'name.required' => 'Enter name.',
        ];
        $rules = [
            'name' => 'required',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('ad.attribute.form.get', [$id])
                ->withErrors($errors)
                ->withInput();
        }
        $name = $request->name;
        if ($id == 0) {
            $attribute = Attribute::create($request->all());
            return redirect()->route('ad.attribute.form.get',[$id])->with('success','Data added successfully.');
        }
        else {
//            $attribute = Attribute::find($id);
//            $attribute->name = $name;
//            $attribute->save();
            Attribute::findOrFail($id)->update($request->all() );
            return redirect()->route('ad.attribute.form.get',[$id])->with('success','Updated successfully.');
        }
    }

    public function getListAttributes(){
        $attributes = Attribute::all();
        $attValues = AttributeValue::orderBy("att_id","DESC")->get();;
        return view('admin.attribute.list',compact('attributes'),compact('attValues'));
    }
    public function  getAttValueForm($id){
        $attributes = Attribute::all();
        if ($id == 0) {
            return view("admin.attribute.attribute_value_form",compact('attributes'));
        } else {
            $attValues = AttributeValue::find($id);
            return view("admin.attribute.attribute_value_form",compact('attributes'),compact('attValues'));
        }
    }
    public function createOrUpdateAttValue($id,Request $request){
        $messages = [
            'att_id.required' => 'Choose attribute',
            'value.required' => 'Enter value.'
        ];
        $rules = [
            'value' => 'required',
            'att_id' => 'required'
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('ad.attribute.attValueForm.get', [$id])
                ->withErrors($errors)
                ->withInput();
        }
        $name = $request->name;
        if ($id == 0) {
            $attribute = AttributeValue::create($request->all());
            return redirect()->route('ad.attribute.attValueForm.get',[$id])->with('success','Data added successfully.');
        }
        else {
            AttributeValue::findOrFail($id)->update($request->all() );
            return redirect()->route('ad.attribute.attValueForm.get',[$id])->with('success','Updated successfully.');
        }
    }
    public function getAttValue(Request $request, $id) {
        if ($request->ajax()) {
            return response()->json([
                'attValue' => AttributeValue::where('att_id', $id)->get()
            ]);
        }
    }

}