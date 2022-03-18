<?php
 

// home admin
Route::get('/admin', 'AdminController@loginAdmin')->name('loginAdmin');

Route::post('/admin', 'AdminController@postLoginAdmin');

Route::get('/admin/logout', 'AdminController@logout'
)->name('logout');

Route::get('/home', function () {
    return view('home');
})->name('homeAdmin');


// sales homepage
Route::get('/', 'HomeController@index')->name('home');

Route::post('/search-product', 'HomeController@searchProduct')->name('searchProduct');
Route::get('/tags/{id}', 'HomeController@showTag')->name('showTag');



//cart
Route::post('/products/add-cart-ajax', 'CartController@addCartAjax')->name('addCartAjax');

Route::get('/products/show-cart', 'CartController@showCart')->name('showCart');

Route::post('/products/update-cart', 'CartController@updateCart')->name('updateCart');

Route::get('/products/delete-cart/{id}', 'CartController@deleteCart')->name('deleteCart');

Route::get('/products/delete-all-product', 'CartController@deleteAll')->name('deleteAll');


//show product
Route::get('/categoryShop/{slug}/{id}',[
    'as' => 'categoryShop.product',
    'uses' => 'CategoryShopController@index'
]);

Route::get('/products/show-product-detail/{id}', 'HomeController@showProductDetail')->name('showProductDetail');


//checkout
Route::get('/login-checkout', 'CheckoutController@loginCheckout'
)->name('loginCheckout');

Route::post('/add-customer', 'CheckoutController@addCustomer'
)->name('addCustomer');

Route::get('/checkout', 'CheckoutController@checkout'
)->name('checkout');

Route::post('/save-checkout-customer', 'CheckoutController@saveCheckoutCustomer'
)->name('saveCheckoutCustomer');

Route::get('/payment', 'CheckoutController@payment'
)->name('payment');

Route::get('/logout-checkout', 'CheckoutController@logoutCheckout'
)->name('logoutCheckout');

Route::post('/login-account', 'CheckoutController@loginAccount'
)->name('loginAccount');

Route::post('/order-place', 'CheckoutController@orderPlace'
)->name('orderPlace');

Route::get('/customer-account', 'CheckoutController@customerAccount'
)->name('customerAccount');


//admin page
Route::prefix('admin')->group(function () {

// catagory
    Route::prefix('categories')->group(function () {
        
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index'
        ]);

        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create'
        ]);

        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete'
        ]);

    });


// orders
    Route::prefix('orders')->group(function () {
        
        Route::get('/', [
            'as' => 'orders.index',
            'uses' => 'OrderController@index'
        ]);

        Route::get('/view/{id}', [
            'as' => 'orders.view',
            'uses' => 'OrderController@viewOrder'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'orders.edit',
            'uses' => 'OrderController@editOrder'
        ]);


        Route::post('/update/{id}', [
            'as' => 'orders.update',
            'uses' => 'OrderController@updateOrder'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'orders.delete',
            'uses' => 'OrderController@delete'
        ]);


    });


// product
    Route::prefix('product')->group(function () {
        
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'AdminProductController@index'
        ]);

        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'AdminProductController@create'
        ]);

        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'AdminProductController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'AdminProductController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'AdminProductController@update'
        ]);
        
        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'AdminProductController@delete'
        ]);

    });


// slider
    Route::prefix('slider')->group(function () {
        
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'SliderAdminController@index'
        ]);

        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'SliderAdminController@create'
        ]);

        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'SliderAdminController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'SliderAdminController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'SliderAdminController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'SliderAdminController@delete'
        ]);
        

    });


//setting
    Route::prefix('settings')->group(function () {
        
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'AdminSettingController@index'
        ]);

        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'AdminSettingController@create'
        ]);

        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'AdminSettingController@store'
        ]);
        
        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'AdminSettingController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'AdminSettingController@update'
        ]);
        
        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'AdminSettingController@delete'
        ]);

    });
});
