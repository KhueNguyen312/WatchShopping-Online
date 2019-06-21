<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeValue;
use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class IndexProductController extends Controller
{
    public function getProducts(){
        $brands = Brand::orderBy("name","DESC")->get();

        $gender_id = Attribute::select('id')->where('name', "Gender")->value('id');
        $genders = AttributeValue::orderBy("value","DESC")->where('att_id',$gender_id )->get();

        $movement_id = Attribute::select('id')->where('name', "Movement")->value('id');
        $movements = AttributeValue::orderBy("value","DESC")->where('att_id',$movement_id )->get();

        $products = Product::orderBy("id","DESC")->where('status',0)->get();
        return view('index.product.product',compact('products','brands','genders','movements'));
    }

    public function filterProducts(Request $request)
    {
        if ($request->ajax()) {
            $msg = "";

            $brands = $request->brands;
            $gender = $request->gender;
            $material = $request->material;
            $temp = "SELECT distinct product.id FROM product JOIN product_attribute on product.id = product_attribute.product_id where product.status = 0";
            $query = "SELECT distinct product.* FROM product JOIN product_attribute on product.id = product_attribute.product_id where product.status = 0";
            if($brands != null){
                $brand_filter = implode("','", $brands);
                $query .= "
                AND brand_id IN('".$brand_filter."')";
            }
            if($gender != null){
                $gender_filter = implode("','", $gender);
                $query .= "
                AND product_attribute.att_value_id IN('".$gender_filter."')";
            }
            if($gender != null){
                $gender_filter = implode("','", $gender);
                $query .= "
                AND product_attribute.att_value_id IN('".$gender_filter."')";
            }
            if($material != null){
                $material_filter = implode("','", $material);
                $query .= "
                AND product.id in (".$temp." AND product_attribute.att_value_id IN('".$material_filter."'))";
            }
                $query .= " order by id DESC";
            $products = DB::select($query);
//            switch (true){
//                case $brands == null && $gender == null:
//                    $products = Product::orderBy("id","DESC")->where('status',0)->get();
//                    echo("<script>console.log('PHP: "."case0"."');</script>");
//                    break;
//                case $brands != null && $gender == null:
//                    $products = Product::orderBy("id","DESC")->whereIn('brand_id', $brands)->get();
//                    echo("<script>console.log('PHP: "."case1"."');</script>");
//                    break;
//                case $gender != null && $brands == null:
//                    $products = Product::join('product_attribute','product.id', '=', 'product_attribute.product_id')
//                        -> whereIn('product_attribute.att_value_id',$gender)
//                        ->get();
//                    echo("<script>console.log('PHP: "."case2"."');</script>");
//                    break;
//                default :
//                    #use whereIn to replace intersect
//                    $products = Product::join('product_attribute','product.id', '=', 'product_attribute.product_id')
//                        -> whereIn('product_attribute.att_value_id',$gender)
//                        -> whereIn('brand_id', $brands)
//                        ->get();
//                    echo("<script>console.log('PHP: "."default"."');</script>");
//                    break;
//
//            }

            if (count($products) == 0)
                $msg = "";
            else{
                foreach($products as $detail){
                    $msg .="<div class=\"col-sm-12 col-md-6 col-lg-4 p-b-50\">
                            <!-- Block2 -->
                            <div class=\"block2\">
                                <div class=\"block2-img wrap-pic-w of-hidden pos-relative block2-labelnew\">
                                    <img class=\"responsive-image img-thumbnail \"  src=\"{$detail->img_link}\" alt=\"IMG-PRODUCT\">
                                    <div class=\"block2-overlay trans-0-4\">
                                        <a href=\"#\" class=\"block2-btn-addwishlist hov-pointer trans-0-4\">
                                            <i class=\"icon-wishlist icon_heart_alt\" aria-hidden=\"true\"></i>
                                            <i class=\"icon-wishlist icon_heart dis-none\" aria-hidden=\"true\"></i>
                                        </a>

                                        <div class=\"block2-btn-addcart w-size1 trans-0-4\">
                                            <!-- Button -->
                                            <button class=\"flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4\">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class=\"block2-txt p-t-20\">
                                    <a href=\"product-detail.html\" class=\"block2-name dis-block s-text3 p-b-5\">
                                        {$detail->name}
                                    </a>

                                    <span class=\"block2-price m-text6 p-r-5\">
										$ {$detail->price}
									</span>
                                </div>
                            </div>
                        </div>";
                }
            }
            echo $msg;
        }

    }

}
