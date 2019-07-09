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

    public function productDetail($id)
    {
        $product = Product::find($id);
        $attributes = Attribute::orderBy("name", "DESC")->get();
        $relatedProducts = Product::Where('brand_id', $product->brand->id)->paginate(10);
        $att_value = array();
        foreach ($attributes as $att) {
            $values = AttributeValue::join('product_attribute', 'attribute_value.id', '=', 'product_attribute.att_value_id')
                ->where('product_attribute.product_id', $id)->where('attribute_value.att_id', $att->id)->get();
            if ($values != null) {
                foreach ($values as $detail) {
                    if (!isset($att_value[$att->name])) {
                        $att_value[$att->name] = strval($detail->value);
                    } else {
                        $att_value[$att->name] .= ", " . strval($detail->value);
                    }
                }
            } else {
                $att_value[$att->name] = "";
            }
        }
        return view('index.product.productdetail', compact('product', 'att_value', 'relatedProducts'));
    }

    public function cart()
    {
        return view('index.cart.cart');
    }

    public function getProducts()
    {
        $brands = Brand::orderBy("name", "DESC")->get();

        $gender_id = Attribute::select('id')->where('name', "Gender")->value('id');
        $genders = AttributeValue::orderBy("value", "DESC")->where('att_id', $gender_id)->get();

        $movement_id = Attribute::select('id')->where('name', "Movement")->value('id');
        $movements = AttributeValue::orderBy("value", "DESC")->where('att_id', $movement_id)->get();

        $products = Product::orderBy("id", "DESC")->where('status', 0)->get();
        return view('index.product.product', compact('products', 'brands', 'genders', 'movements'));
    }

    public function getProductByBrand($id)
    {
        $products = Product::orderBy("id", "DESC")->where('status', 0)->where('brand_id', $id)->get();
        $gender_id = Attribute::select('id')->where('name', "Gender")->value('id');
        $genders = AttributeValue::orderBy("value", "DESC")->where('att_id', $gender_id)->get();

        $movement_id = Attribute::select('id')->where('name', "Movement")->value('id');
        $movements = AttributeValue::orderBy("value", "DESC")->where('att_id', $movement_id)->get();
        $brand = Brand::where('id', $id)->get();
        return view('index.product.brand', compact('products', 'genders', 'movements', 'brand'));
    }

    public function getMenWatches()
    {
        $brands = Brand::orderBy("name", "DESC")->get();

        $gender_id = Attribute::select('id')->where('name', "Gender")->value('id');
        $genders = AttributeValue::orderBy("value", "DESC")->where('att_id', $gender_id)->get();

        $movement_id = Attribute::select('id')->where('name', "Movement")->value('id');
        $movements = AttributeValue::orderBy("value", "DESC")->where('att_id', $movement_id)->get();

        $products = Product::orderBy("product.id", "DESC")->join('product_attribute', 'product.id', '=', 'product_attribute.product_id')->
        join('attribute_value', 'attribute_value.id', '=', 'product_attribute.att_value_id')->where('attribute_value.value', 'like', 'men%')
            ->orWhere('attribute_value.value', 'like', '%nam%')->get();
        //create a array contains what need to show in html page
        $data = array("name" => "Men's Watches", "banner" => "https://www.collectoffers.com/EditorImages/banner-man-watch.jpg",
            "see_also_name" => "Ladies Watches", "link" => "/watchshoppingonline/public/ladies-watches");
        return view('index.product.categorytemplate', compact('products', 'data', 'genders', 'movements', 'brands'));
    }
    public function getLadiesWatches()
    {
        $brands = Brand::orderBy("name", "DESC")->get();

        $gender_id = Attribute::select('id')->where('name', "Gender")->value('id');
        $genders = AttributeValue::orderBy("value", "DESC")->where('att_id', $gender_id)->get();

        $movement_id = Attribute::select('id')->where('name', "Movement")->value('id');
        $movements = AttributeValue::orderBy("value", "DESC")->where('att_id', $movement_id)->get();

        $products = Product::orderBy("product.id", "DESC")->join('product_attribute', 'product.id', '=', 'product_attribute.product_id')->
        join('attribute_value', 'attribute_value.id', '=', 'product_attribute.att_value_id')->where('attribute_value.value', 'like', '%ladi%')
            ->orWhere('attribute_value.value', 'like', '%women%')
            ->orWhere('attribute_value.value', 'like', '%nu%')->get();
        //create a array contains what need to show in html page
        $data = array("name" => "Ladies Watches", "banner" => "http://watchmarkaz.pk/img/brandspic/1186067550000.jpg",
            "see_also_name" => "Mens Watches", "link" => "/watchshoppingonline/public/men-watches");
        return view('index.product.categorytemplate', compact('products', 'data', 'genders', 'movements', 'brands'));
    }
    public function getSaleWatches(){
        $brands = Brand::orderBy("name", "DESC")->get();

        $gender_id = Attribute::select('id')->where('name', "Gender")->value('id');
        $genders = AttributeValue::orderBy("value", "DESC")->where('att_id', $gender_id)->get();

        $movement_id = Attribute::select('id')->where('name', "Movement")->value('id');
        $movements = AttributeValue::orderBy("value", "DESC")->where('att_id', $movement_id)->get();

        $products = Product::orderBy("product.id", "DESC")->where('product.discount', '>', 0)->get();
        //create a array contains what need to show in html page
        $data = array("name" => "Sale Watches", "banner" => "https://d3l9endf6kojd4.cloudfront.net/media/wysiwyg/sale-menu-banner1.jpg",
            "see_also_name" => "All watches", "link" => "/watchshoppingonline/public/watches");
        return view('index.product.categorytemplate', compact('products', 'data', 'genders', 'movements', 'brands'));
    }

    public function filterProducts(Request $request)
    {
        if ($request->ajax()) {
            $msg = "";

            $brands = $request->brands;
            $gender = $request->gender;
            $material = $request->material;
            $pageType = $request->page_type;
            if ($pageType == "gender") {
                if($request->name == "Men's Watches")
                    $query = "SELECT distinct  product.* from product join product_attribute on product_attribute.product_id = product.id
                          join attribute_value on product_attribute.att_value_id = attribute_value.id 
                          where (attribute_value.value like \"men%\" or attribute_value.value like \"%Nam%\") and product.status = 0";
                else{
                    $query = "SELECT distinct  product.* from product join product_attribute on product_attribute.product_id = product.id
                          join attribute_value on product_attribute.att_value_id = attribute_value.id 
                          where (attribute_value.value like \"%women%\" or attribute_value.value like \"%lad%\" 
                          or attribute_value.value like \"%nu%\") and product.status = 0";
                }
            } else {
                $query = "SELECT distinct product.* FROM product JOIN product_attribute on product.id = product_attribute.product_id where product.status = 0";
            }
            $temp = "SELECT distinct product.id FROM product JOIN product_attribute on product.id = product_attribute.product_id where product.status = 0";

            if ($brands != null) {
                $brand_filter = implode("','", $brands);
                $query .= "
                AND brand_id IN('" . $brand_filter . "')";
            }
            if ($gender != null) {
                $gender_filter = implode("','", $gender);
                $query .= "
                AND product_attribute.att_value_id IN('" . $gender_filter . "')";
            }
            if ($gender != null) {
                $gender_filter = implode("','", $gender);
                $query .= "
                AND product_attribute.att_value_id IN('" . $gender_filter . "')";
            }
            if ($material != null) {
                $material_filter = implode("','", $material);
                $query .= "
                AND product.id in (" . $temp . " AND product_attribute.att_value_id IN('" . $material_filter . "'))";
            }
            if ($pageType == "brand") {
                $brand_id = $request->id;
                $query .= "AND product.brand_id = " . $brand_id;
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
            else {
                foreach ($products as $detail) {
                    $msg .= "<div class=\"col-sm-12 col-md-6 col-lg-4 p-b-50\">
                            <!-- Block2 -->
                            <div class=\"block2\">";
                               if ($detail->discount > 0)
                                       $msg .="<div class=\"block2-img wrap-pic-w of-hidden pos-relative block2-labelsale \">";
                                           else
                                                $msg .= "<div class=\"block2-img wrap-pic-w of-hidden pos-relative block2-labelnew\">";
                                                  
                                    $msg .= "<img class=\"responsive-image img-thumbnail \"  src=\"{$detail->img_link}\" alt=\"IMG-PRODUCT\">
                                    <div class=\"block2-overlay trans-0-4\">
                                        <a href=\"#\" class=\"block2-btn-addwishlist hov-pointer trans-0-4\">
                                            <i class=\"icon-wishlist icon_heart_alt\" aria-hidden=\"true\"></i>
                                            <i class=\"icon-wishlist icon_heart dis-none\" aria-hidden=\"true\"></i>
                                        </a>

                                        <div class=\"block2-btn-addcart w-size1 trans-0-4\">
                                            <!-- Button -->
                                            <button data-for=\"{$detail->id}\" class=\" btn-addcart flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4\">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class=\"block2-txt p-t-20\">
                                    <a href=\"/watchshoppingonline/public/product-detail/{$detail->id}\" class=\"block2-name dis-block s-text3 p-b-5\">
                                        {$detail->name}
                                    </a>";
                                    

                                     if($detail->discount > 0) {
                                         $msg .= "  <span class=\"block2-oldprice m-text7 p-r-5\">";
                                         $msg .= "$";

                                         $msg.= strval( $detail->price);
                                         $msg .= "</span>

                                            <span class=\"block2-newprice m-text8 p-r-5\">";
                                         $msg .= "$";
                                         $msg.= strval($detail->price * (1 - $detail->discount));
                                         $msg .= "</span>";
                                     }else{
                                            $msg.="<span class=\"block2-price m-text6 p-r-5\">";
										$msg.="$";
                        $detail->price;
									    $msg.="</span>
                                        
                                </div>
                            </div>
                        </div>";}
                }
            }
            echo $msg;
        }

    }

    public function addToCart(Request $request)
    {
        $shipCost = 15;
        if ($request->id) {
            $id = $request->id;
            $qty = $request->qty;
            $product = Product::find($id);
            $newTotal = 0;
            $count = 0;
            $msg = "";
            if (!$product) {

                abort(404);

            }

            $cart = session()->get('cart');


            // if cart is empty then this the first product
            if($product->discount > 0){

            }

            if (!$cart) {

                $cart = [
                    $id => [
                        "id" => $product->id,
                        "name" => $product->name,
                        "quantity" => $qty,
                        "price" => $product->price *(1-$product->discount),
                        "img_link" => $product->img_link
                    ]
                ];
                session()->put('cart', $cart);
                foreach ($cart as $details) {
                    $msg .= "<li class=\"header-cart-item\">
                                        <div class=\"header-cart-item-img\">
                                            <img src=\"{$details['img_link']}\" alt=\"IMG\">
                                        </div>

                                        <div class=\"header-cart-item-txt\">
                                            <a href=\"#\" class=\"header-cart-item-name\">
                                                {$details['name']}
                                            </a>

                                            <span class=\"header-cart-item-info\">
											{$details['quantity']} x $ {$details['price']}
										</span>
                                        </div>
                                    </li>";
                }
                $count++;
                $newTotal = $cart[$id]["price"] * $cart[$id]["quantity"];
                $subtotal = $newTotal;
                $mess1 = strval($cart[$id]['quantity']) . " x " . strval($cart[$id]['price']);
                if(session()->get('coupon')){
                    $discount = session()->get('coupon')["discount"];
                    if(session()->get('coupon')["type"] == 0)
                        $newTotal = $newTotal*((100-$discount)/100) + $shipCost;
                    else
                        $newTotal = $newTotal- $discount + $shipCost;
                }
                $mess2 = strval($newTotal);
                $mess3 = strval($count);
                $mess4 = strval($subtotal);
                echo json_encode(array($msg, $mess2, $mess3,$mess4));
                return;
                //return redirect()->back();
            }

            // if cart not empty then check if this product exist then increment quantity
            if (isset($cart[$id])) {

                $cart[$id]['quantity']+=$qty;

                session()->put('cart', $cart);
                foreach ($cart as $details) {
                    $msg .= "<li class=\"header-cart-item\">
                                        <div class=\"header-cart-item-img\">
                                            <img src=\"{$details['img_link']}\" alt=\"IMG\">
                                        </div>

                                        <div class=\"header-cart-item-txt\">
                                            <a href=\"#\" class=\"header-cart-item-name\">
                                                {$details['name']}
                                            </a>

                                            <span class=\"header-cart-item-info\">
											{$details['quantity']} x $ {$details['price']}
										</span>
                                        </div>
                                    </li>";
                }
                foreach ($cart as $item) {
                    $newTotal += $item["price"] * $item["quantity"];
                    $count++;
                }
                $subtotal = $newTotal;
                if(session()->get('coupon')){
                    $discount = session()->get('coupon')["discount"];
                    if(session()->get('coupon')["type"] == 0)
                        $newTotal = $newTotal*((100-$discount)/100) + $shipCost;
                    else
                        $newTotal = $newTotal- $discount + $shipCost;
                }
                $mess1 = strval($cart[$id]['quantity']) . " x " . strval($cart[$id]['price']);
                $mess2 = strval($newTotal);
                $mess3 = strval($count);
                $mess4 = strval($subtotal);
                echo json_encode(array($msg, $mess2, $mess3,$mess4));
                return;
                //return redirect()->back();

            }

            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => $qty,
                "price" => $product->price,
                "img_link" => $product->img_link
            ];

            session()->put('cart', $cart);
            foreach ($cart as $details) {
                $msg .= "<li class=\"header-cart-item\">
                                        <div class=\"header-cart-item-img\">
                                            <img src=\"{$details['img_link']}\" alt=\"IMG\">
                                        </div>

                                        <div class=\"header-cart-item-txt\">
                                            <a href=\"#\" class=\"header-cart-item-name\">
                                                {$details['name']}
                                            </a>

                                            <span class=\"header-cart-item-info\">
											{$details['quantity']} x $ {$details['price']}
										</span>
                                        </div>
                                    </li>";
            }
            foreach ($cart as $item) {
                $newTotal += $item["price"] * $item["quantity"];
                $count++;
            }
            $subtotal = $newTotal;
            if(session()->get('coupon')){
                $discount = session()->get('coupon')["discount"];
                if(session()->get('coupon')["type"] == 0)
                    $newTotal = $newTotal*((100-$discount)/100) + $shipCost;
                else
                    $newTotal = $newTotal- $discount + $shipCost;
            }
            $mess1 = strval($cart[$id]['quantity']) . " x " . strval($cart[$id]['price']);
            $mess2 = strval($newTotal);
            $mess3 = strval($count);
            $mess4 = strval($subtotal);
            echo json_encode(array($msg, $mess2, $mess3,$mess4));
            return;

            //return redirect()->back();
        }

    }

    public function update(Request $request)
    {
        $shipCost = 15;
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);
            $newPrice = $cart[$request->id]["quantity"] * $cart[$request->id]["price"];
            $newTotal = 0;
            foreach ($cart as $id) {
                $newTotal += $id["price"] * $id["quantity"];
            }
            $subtotal = $newTotal;
            if(session()->get('coupon')){
                $discount = session()->get('coupon')["discount"];
                if(session()->get('coupon')["type"] == 0)
                    $newTotal = $newTotal*((100-$discount)/100) + $shipCost;
                else
                    $newTotal = $newTotal- $discount + $shipCost;
            }
            $mess1 = strval($newPrice);
            $mess2 = strval($newTotal);
            $mess4 = strval($subtotal);
            echo json_encode(array($mess1, $mess2,$mess4));
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
}
