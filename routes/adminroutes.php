<?php 

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
			        Route::resource('sliders', 'SlidersController');
			        Route::resource('tags', 'TagsController');
			        Route::get('product/removeImage/{id}', 'ProductController@remove_image')->name('remove.image');
			        Route::resource('sitesettings', 'SettingsController');
				});