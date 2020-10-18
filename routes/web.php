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

Route::group(['prefix' => 'superadmin', 'middleware' => 'auth'], function(){
	Route::get('/', 'MainController@index')->name('superadmin');
	Route::get('/categories', 'MainController@categories')->name('superadmin.categories');
	Route::get('/category/{id}', 'MainController@show_category');

	Route::get('/clientThemeAssign', 'MainController@clientThemeAssign')->name('superadmin.client_theme');
});

Route::post('cart/ajax', 'FrontController@ajax_cart_update');
Route::post('wishlist/ajax', 'FrontController@ajax_wishlist_update');
Route::post('/view_single_order', 'Theme2\FrontController@view_single_order')->name('admin.view_order_single');

// Route::group(['prefix' => 'theme5'], function(){

	Route::get('/', 'Theme2\FrontController@index');
	Route::get('/previewEdit', 'Theme2\FrontController@previewEdit');
	Route::get('/login_new', 'Theme2\FrontController@login_new')->name('login.new2');
	Route::get('user/register', 'Theme2\FrontController@register_new')->name('register.new2');
	Route::get('reset/password', 'Theme2\FrontController@reset_password')->name('resetpass.new2');

	Route::get('category/{slug}', 'Theme2\FrontController@get_products_by_category')->name('category.product.new2');
	Route::get('product/{slug}', 'Theme2\FrontController@view_product')->name('view.product.new2');

	Route::get('view/product/{id}', 'Theme2\FrontController@view_product_id')->name('view.product.new55');

	Route::get('contact-us', 'Theme2\FrontController@contact');
	Route::get('privacy-policy', 'Theme2\FrontController@privacy_policy');
	Route::get('privacy-policy-app', 'Theme2\FrontController@privacy_policy_app');

	Route::get('show-cart', 'Theme2\FrontController@cart_view')->name('cart.view2');
	Route::get('wish-list/{id}', 'Theme2\FrontController@wishlist')->middleware(['auth'])->name('wish2');
	Route::get('show-checkout', 'Theme2\FrontController@checkout_view')->name('checkout.view2');
	Route::post('search/product', 'Theme2\FrontController@search_product')->name('search.product2');
	Route::get('about-us', 'Theme2\FrontController@about_us');
	Route::post('checkout', 'CheckoutController@store')->name('checkout.theme2');

	Route::post('checkout-store', 'CheckoutNewController@store')->name('checkout.newstore');
	Route::get('order-success', 'CheckoutNewController@order_success')->name('order.success');
	Route::post('payment-update', 'CheckoutNewController@update_payment_status')->name('update.payment');

	Route::get('featured/products', 'Theme2\FrontController@get_all_featured')->name('featured.all');
	Route::get('products/more', 'Theme2\FrontController@get_all_products_more')->name('products.more');
	Route::get('brands/products/{id}', 'Theme2\FrontController@get_all_products_brands')->name('products.brands');

	Route::get('user/orders/{id}', 'Theme2\FrontController@user_orders')->middleware(['auth'])->name('user.orders');
// });

// Route::get('/', 'FrontController@index_new');
// Route::get('more-products', 'FrontController@get_more_products')->name('more.products');
// Route::get('category/{slug}', 'FrontController@get_products_by_category')->name('category.product');
// Route::get('product/{slug}', 'FrontController@view_product')->name('view.product');
Route::resource('cart', 'CartController');
Route::resource('checkout', 'CheckoutController');

Auth::routes();
Route::get('/order', function(){
	return view('boost_order');
});
Route::post('/boost-order/store', 'FrontController@boost_order_store')->name('boost.order.store'); 
// Route::get('/', 'FrontController@index')->name('index');
// Route::get('/', 'FrontController@themes_list')->name('themes');

Route::get('/encoders', 'FrontController@encoders')->name('encoders'); // for test only

Route::get('admin/boosted/orders', 'OrdersController@boosted_orders')->name('orders.boosted_orders');

Route::get('/suppliers', 'FrontController@get_all_suppliers')->name('suppliers');
Route::get('/privacy_policy', function(){
	return view('pages.privacy_policy');
});

Route::get('register', function(){
	return view('auth.login');
})->name('register');
Route::get('supplier', function(){
	return view('pages.suppliers.index')->with('users', App\User::orderBy('id','desc')->get());
});
Route::get('supplier/{id}', function(){
	return view('pages.suppliers.index')->with('users', App\User::orderBy('id','desc')->get());
});
Route::get('category', function(){
	return redirect()->route('index');
});
Route::get('product', function(){
	return redirect()->route('index');
});

Route::get('supplier/{id}/{name}', 'FrontController@view_supplier')->name('view.supplier');
// Route::post('search/product', 'FrontController@search_product')->name('search.product');
Route::post('user_reviews', 'FrontController@add_review')->name('add.review');
Route::post('product/review', 'FrontController@insert_product_review')->name('product.review');
Route::post('product/by/location', 'FrontController@get_products_by_location')->name('product.location');

Route::get('Featured-Products', 'FrontController@get_featured_products')->name('featured.products');

//ORDERS
Route::post('/order/store', 'OrdersController@store_order')->name('order.store');

Route::get('/ajax/set_session', 'FrontController@set_session_product_id');
Route::resource('sliders', 'SlidersController');

Route::resource('themesList', 'ThemesListController');
Route::resource('admin/brands', 'BrandController');
Route::post('/sliders/store_offers', 'SlidersController@store_offers')->name('slider.offers');
Route::group([
				'prefix' => 'admin',
				'middleware' => 'auth',
			],
			function(){
				Route::get('/', 'ProductController@index')->name('dashboard');
				Route::resource('/products', 'ProductController');
				Route::resource('/categories', 'CategoryController');
				Route::resource('/profile', 'ProfileController');
				Route::resource('/users', 'UserController');
				Route::resource('/photos', 'PhotosController');
        		Route::resource('/videos', 'VideosController');
				Route::post('/make/featured', 'AdminController@make_featured')->name('make.featured');
				Route::post('/unmake/featured', 'AdminController@unmake_featured')->name('unmake.featured');
		        Route::get('featured', 'AdminController@featured')->name('featured.index');
		        Route::resource('orders', 'OrdersController');
		        Route::resource('reviews', 'ReviewsController');
		        Route::get('/showorders', 'AdminController@get_all_orders')->name('orders.showall');
		        Route::get('suspend/users', 'AdminController@suspend_users')->name('users.suspend');
		        Route::post('suspend/users', 'AdminController@make_user_suspend')->name('make.users.suspend');
		        Route::resource('/managesuppliers', 'SupplierController', ['except' => ['show', 'index', 'destroy']]);
		        
		        Route::resource('tags', 'TagsController');
		        Route::get('product/removeImage/{id}', 'ProductController@remove_image')->name('remove.image');
				Route::resource('sitesettings', 'SettingsController');
				
				Route::get('deal_of_week', 'AdminController@deal_of_week')->name('deal_of_week');
				Route::post('make_deal_of_week', 'AdminController@make_deal_of_week')->name('make.deal_of_week');
		        Route::post('unmake_deal_of_week', 'AdminController@unmake_deal_of_week')->name('unmake.deal_of_week');
				
				Route::get('clientThemeAssign', 'AdminController@clientThemeAssign')->name('clientThemeAssign');
				Route::post('make_theme_assign', 'AdminController@make_theme_assign')->name('make.theme_assign');
				
				Route::get('/showorders', 'AdminController@get_all_orders')->name('orders.showall');
				Route::get('/paid-orders', 'AdminController@get_all_paid_orders')->name('orders.paid');

				Route::get('/showorders_new', 'AdminController@get_all_orders_new')->name('orders.showallnew');

				Route::get('/due/bill', 'AdminController@due_billing')->name('bill.due');
			});



Route::get('login/facebook/', 'Auth\LoginController@redirectToFacebookProvider')->name('facebook.login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

// Route::post('khalti/verifyKhaltiPayment', 'CheckoutNewController@verifyKhaltiPayment')->name('khalti.verification');
Route::post('khalti/verifyKhaltiPayment', 'KhaltiController@transaction')->name('khalti.verification');