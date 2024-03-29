
<?php

use Illuminate\Support\Facades\Route;

Route::get('command', function() {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    return "Command Successfully";
});

Route::group(['middleware' => 'prevent-back-history', 'namespace' => 'Front', 'as' => 'front.'], function(){
    Route::group(['middleware' => ['guest:web']], function () {
        Route::get('login', 'AuthController@login')->name('login');
        Route::post('signin', 'AuthController@signin')->name('signin');

        Route::get('signup', 'AuthController@signup')->name('signup');
        Route::post('register', 'AuthController@register')->name('register');

        Route::get('verification/{string?}', 'AuthController@verifiaction')->name('verifiaction');

        Route::get('forget-password', 'AuthController@forget_password')->name('forget.password');
        Route::post('password-forget', 'AuthController@password_forget')->name('password.forget');
        Route::get('reset-password/{string?}', 'AuthController@reset_password')->name('reset.password');
        Route::post('recover-password', 'AuthController@recover_password')->name('recover.password');
    });

    Route::group(['middleware' => ['auth:web']], function () {
        Route::get('logout', 'AuthController@logout')->name('logout');
    });

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('menu', 'HomeController@menu')->name('menu');
    Route::get('gallery', 'HomeController@gallery')->name('gallery');
    Route::get('about', 'HomeController@about')->name('about');
    Route::get('contact', 'HomeController@contact')->name('contact');
    Route::post('contact_store', 'HomeController@contact_store')->name('contact_store');
    Route::get('testimonial', 'HomeController@testimonial')->name('testimonial');
    Route::get('faq', 'HomeController@faq')->name('faq');
    Route::get('terms', 'HomeController@terms')->name('terms');
    Route::get('privacy', 'HomeController@privacy')->name('privacy');
    Route::get('product-detail/{id?}', 'HomeController@product_detail')->name('product-detail');
    Route::get('error', 'HomeController@error')->name('error');

    Route::get('cart', 'HomeController@cart')->name('cart');
    Route::get('checkout', 'HomeController@checkout')->name('checkout');
    Route::get('products/{id?}', 'HomeController@products')->name('products');

    Route::post('subscribe', 'HomeController@subscribe')->name('subscribe');
});

Route::get('/admin', function(){ return redirect()->route('back.login'); });

Route::group(['middleware' => 'prevent-back-history', 'namespace' => 'Back', 'as' => 'back.', 'prefix' => 'back'], function(){
    Route::group(['middleware' => ['guest:admin']], function () {
        Route::get('login', 'AuthController@login')->name('login');
        Route::post('signin', 'AuthController@signin')->name('signin');

        Route::get('forget-password', 'AuthController@forget_password')->name('forget.password');
        Route::post('password-forget', 'AuthController@password_forget')->name('password.forget');

        Route::get('reset-password/{string?}', 'AuthController@reset_password')->name('reset.password');
        Route::post('recover-password', 'AuthController@recover_password')->name('recover.password');
    });

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('logout', 'AuthController@logout')->name('logout');

        Route::get('home', 'HomeController@index')->name('home');

        /** profile */
            Route::get('profile', 'ProfileController@profile')->name('profile');
            Route::get('profile-edit', 'ProfileController@profile_edit')->name('profile.edit');
            Route::PATCH('profile-update', 'ProfileController@profile_update')->name('profile.update');
            Route::get('profile-change-password', 'ProfileController@change_password')->name('profile.change.password');
            Route::post("profile-reset-password", "ProfileController@reset_password")->name('profile.reset.password');
        /** profile */

        /** Users */
            Route::any('users', 'UsersController@index')->name('users');
            Route::get('users/create', 'UsersController@create')->name('users.create');
            Route::post('users/insert', 'UsersController@insert')->name('users.insert');
            Route::get('users/view/{id?}', 'UsersController@view')->name('users.view');
            Route::get('users/edit/{id?}', 'UsersController@edit')->name('users.edit');
            Route::patch('users/update', 'UsersController@update')->name('users.update');
            Route::post('users/change-status', 'UsersController@change_status')->name('users.change.status');
            Route::post('users/delete-image', 'UsersController@delete_image')->name('users.delete.image');
        /** Users */

        /** Categories */
            Route::any('categories', 'CategoriesController@index')->name('categories');
            Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
            Route::post('categories/insert', 'CategoriesController@insert')->name('categories.insert');
            Route::get('categories/view/{id?}', 'CategoriesController@view')->name('categories.view');
            Route::get('categories/edit/{id?}', 'CategoriesController@edit')->name('categories.edit');
            Route::patch('categories/update', 'CategoriesController@update')->name('categories.update');
            Route::post('categories/change-status', 'CategoriesController@change_status')->name('categories.change.status');
        /** Categories */

        /** Products */
            Route::any('products', 'ProductsController@index')->name('products');
            Route::get('products/create', 'ProductsController@create')->name('products.create');
            Route::post('products/insert', 'ProductsController@insert')->name('products.insert');
            Route::get('products/view/{id?}', 'ProductsController@view')->name('products.view');
            Route::get('products/edit/{id?}', 'ProductsController@edit')->name('products.edit');
            Route::patch('products/update', 'ProductsController@update')->name('products.update');
            Route::post('products/change-status', 'ProductsController@change_status')->name('products.change.status');
        /** Products */

        /** Subscriber */
            Route::any('subscribers', 'SubscribersController@index')->name('subscribers');
            Route::post('subscribers/deletes', 'SubscribersController@delete')->name('subscriber.deletes');
        /** Subscriber */

        /** Contact-us */
            Route::any('contacts', 'ContactsController@index')->name('contacts');
            Route::get('contacts/view/{id?}', 'ContactsController@view')->name('contacts.view');
            Route::post('contacts/delete', 'ContactsController@delete')->name('contacts.delete');
        /** Contact-us */

        /** Reviews */
            Route::any('reviews', 'ReviewsController@index')->name('reviews');
            Route::get('reviews/create', 'ReviewsController@create')->name('reviews.create');
            Route::post('reviews/insert', 'ReviewsController@insert')->name('reviews.insert');
            Route::get('reviews/view/{id?}', 'ReviewsController@view')->name('reviews.view');
            Route::get('reviews/edit/{id?}', 'ReviewsController@edit')->name('reviews.edit');
            Route::patch('reviews/update', 'ReviewsController@update')->name('reviews.update');
            Route::post('reviews/change-status', 'ReviewsController@change_status')->name('reviews.change.status');
        /** Reviews */

        /** FAQ */
            Route::any('FAQs', 'FAQsController@index')->name('FAQs');
            Route::get('FAQs/create', 'FAQsController@create')->name('FAQs.create');
            Route::post('FAQs/insert', 'FAQsController@insert')->name('FAQs.insert');
            Route::get('FAQs/view/{id?}', 'FAQsController@view')->name('FAQs.view');
            Route::get('FAQs/edit/{id?}', 'FAQsController@edit')->name('FAQs.edit');
            Route::PATCH('FAQs/update', 'FAQsController@update')->name('FAQs.update');
            Route::post('FAQs/change-status', 'FAQsController@change_status')->name('FAQs.change.status');
        /** FAQ */

        /** Timings */
            Route::any('timings', 'TimingController@index')->name('timings');
            Route::post('timings/update', 'TimingController@update')->name('timings.update');
        /** Timings */

        /** Settings */
            Route::get('settings', 'SettingsController@index')->name('settings');
            Route::post('settings/update', 'SettingsController@update')->name('settings.update');
            Route::post('settings/logo/update', 'SettingsController@logo_update')->name('settings.update.logo');
        /** Settings */
    });
});
