<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//login
Route::get("ad/login", "Auth\AdminLoginController@index")->name('ad.login');
Route::post("ad/login", "Auth\AdminLoginController@checklogin")->name('ad.checklogin');
Route::get("ad/logout", "Auth\AdminLoginController@getLogout")->name('ad.logout');
Route::group(['prefix' => 'ad', 'middleware' => 'adminLogin'], function () {

    Route::get("home", "AdminContactController@contact")->name('ad.dashboard')->middleware('adminLogin');

    Route::get("attribute", "AdminAttributeController@getListAttributes")->name("ad.attribute.list.get");
    Route::get("attribute/form/{id}","AdminAttributeController@getForm")->name("ad.attribute.form.get");
    Route::post("attribute/form/{id}","AdminAttributeController@createOrUpdateObj")->name("ad.attribute.form.post");
    Route::get("attribute/attValueForm/{id}","AdminAttributeController@getAttValueForm")->name("ad.attribute.attValueForm.get");
    Route::post("attribute/attValueForm/{id}","AdminAttributeController@createOrUpdateAttValue")->name("ad.attribute.attValueForm.post");

    Route::get("brand", "BrandController@getListBrands")->name("ad.brand.list.get");
    Route::get("brand/form/{id}","BrandController@getForm")->name("ad.brand.form.get");
    Route::post("brand/form/{id}","BrandController@createOrUpdateBrand")->name("ad.brand.form.post");

    Route::get("product", "ProductController@getListProducts")->name("ad.product.list.get");
    Route::get("product/form/{id}","ProductController@getForm")->name("ad.product.form.get");
    Route::get("product/detailForm/{id}","ProductController@getDetailForm")->name("ad.product.detailForm.get");
    Route::post("product/detailForm/{id}","ProductController@addProductAttribute")->name("ad.product.detailForm.post");
    Route::post("product/form/{id}","ProductController@createOrUpdateProduct")->name("ad.product.form.post");
    Route::get("loadAtt/{id}", "AdminAttributeController@getAttValue")->name("ad.loadAtt");
    Route::delete('deleteAtt/{id}', "ProductController@removeAttribute")->name("ad.deleteAtt");
    Route::post('changeStatus', 'ProductController@changeStatus')->name('ad.product.dis');

    Route::get("invoice", "InvoiceController@getListInvoices")->name("ad.invoice.list.get");
    Route::post("change-status", "InvoiceController@changeInvoiceStatus")->name("ad.invoice.status");
    Route::get("view-invoice/{id}", "InvoiceController@getInvoice")->name("ad.invoice.get");
    Route::get("generate-pdf/{id}", "InvoiceController@generatePDF")->name("ad.invoice.generate");
    Route::get("invoice/invoiceDetail/{id}","InvoiceController@getListInvoiceDetail")->name("ad.invoice.detail.get");

    Route::get("user", "AdminController@getListUser")->name("ad.user.list.get");
    Route::get("profile/{id}", "AdminController@getUserInfo")->name("ad.user.profile");
    Route::post("profile/update/{id}","AdminController@updateUserInfo")->name("ad.admin.edit");
    Route::get('/customer', 'CustomerController@getCustomer')->name('ad.customer.list.get');
    Route::get('/user/form/{id}', 'AdminController@getForm')->name('ad.admin.form.get');
    Route::post("profile/add/{id}","AdminController@addUser")->name("ad.admin.add");

    Route::get("sale-report", "ReportController@getReport")->name("ad.report.get");
    Route::get("sale-report/load", "ReportController@showDetail")->name("ad.report.load");

    Route::get("coupon", "CouponController@getListCoupon")->name("ad.coupon.list.get");
    Route::get("coupon/form/{id}","CouponController@getForm")->name("ad.coupon.form.get");
    Route::post("coupon/form/{id}","CouponController@createOrUpdateCoupon")->name("ad.coupon.form.post");
    Route::post('coupon/changeStatus', 'CouponController@changeStatus')->name('ad.coupon.dis');

    Route::get("contact", "AdminContactController@contact")->name("ad.contact.get");
    Route::post("change-contact-status", "AdminContactController@changeContactStatus")->name("ad.contact.status");
});


//home
//Route::get("ad/home", "AdminDashboardController@index")->name('ad.dashboard');
//home
Route::get('/','IndexHomeController@getHome')->name('index.home.get');
Route::get('/watches','IndexProductController@getProducts')->name('index.watches.get');
Route::get('/cart','IndexProductController@cart')->name('index.cart.get');
Route::patch('update-cart','IndexProductController@update')->name('index.cart.update');
Route::delete('remove-from-cart', 'IndexProductController@remove')->name('index.cart.remove');
Route::get('/add-to-cart/{id}','IndexProductController@addToCart')->name('index.addToCart.get');
Route::get('/product-detail/{id}','IndexProductController@productDetail')->name('index.productDetail.get');
Route::get('/brand/{id}','IndexProductController@getProductByBrand')->name('index.productBrand.get');
Route::get('/men-watches','IndexProductController@getMenWatches')->name('index.menWatches.get');
Route::get('/sale','IndexProductController@getSaleWatches')->name('index.sale.get');
Route::get('/ladies-watches','IndexProductController@getLadiesWatches')->name('index.ladiesWatches.get');
Route::post('/watches/filter', 'IndexProductController@filterProducts')->name('getfilter');
Route::post('/watches/sort', 'IndexProductController@filterCost')->name('index.sort');
Route::get('/checkout','CheckOutController@checkOut')->name('index.checkout.get');
Route::post('/ordered', 'CheckOutController@ordered')->name('index.checkout.ordered');
Route::post('/check-coupon', 'CouponController@checkCoupon')->name('index.checkCoupon');
Route::post('/remove-coupon', 'CouponController@removeCoupon')->name('index.removeCoupon');
Route::get('/login', 'UserLoginController@getLoginForm')->name('index.login.get');
Route::post("/login", "UserLoginController@checkLogin")->name('index.checkLogin');
Route::get('/logout', 'UserLoginController@getLogout')->name('index.logout.get');
Route::get('/register', 'UserLoginController@getRegisterForm')->name('index.register.get');
Route::get('/contact', 'IndexContactController@getContact')->name('index.contact.get');
Route::post('/contact', 'IndexContactController@submitFeedBack')->name('index.contact.post');
//admin
Route::group(['prefix' => 'ad'], function () {

});

Route::get('/home', 'HomeController@index')->name('home');
