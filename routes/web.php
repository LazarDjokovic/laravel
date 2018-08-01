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

Route::get('/','FrontendController@index')->name('home');
Route::get('/all_products','FrontendController@all_products')->name('all_products');
Route::get('/gallery','FrontendController@gallery')->name('gallery');
Route::get('/author','FrontendController@author')->name('author');
Route::get('/register','FrontendController@register')->name('register');
Route::get('/one_product/{id?}','FrontendController@one_product')->name('one_product');

Route::group(['middleware'=>'user_profile'],function (){
    Route::get('/user_profile/{id?}','FrontendController@user_profile')->name('user_profile');
    Route::post('/user_profile/change_picture','FrontendController@change_profile_picture')->name('change_profile_picture');
    Route::get('/delete_orders/{id}','FrontendController@delete_orders');
});




Route::post('/register_check','UserController@store')->name('register_check');
Route::post('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');
Route::post('/contact_send','FrontendController@contact_send')->name('contact_send');


Route::post('/add_to_cart','FrontendController@add_to_cart')->name('add_to_cart');

Route::get('/ajax_orders/{id}','FrontendController@getOrders');
Route::get('/numberOfOrders/{id}','FrontendController@numberOfOrders');

Route::get('/poll','FrontendController@getPoll')->name('poll');
Route::get('/poll_vote/{idQuestion}/{idAnswer}/{ipAddress}','FrontendController@setPollVote');

Route::group(['middleware'=>'admin'],function (){
    Route::get('/admin','Admin\UserAdminController@admin')->name('admin');
    Route::get('/pages','Admin\PagesAdminController@getPages')->name('adminPages');
    Route::get('/adminSlider','Admin\SliderAdminController@getSlider')->name('adminSlider');
    Route::get('/adminGallery','Admin\GalleryAdminController@getGallery')->name('adminGallery');
    Route::get('/adminProduct','Admin\ProductAdminController@getProducts')->name('adminProduct');
    Route::get('/adminPoll','Admin\PollAdminController@getPolls')->name('adminPoll');

    Route::get('/adminAddPage','Admin\PagesAdminController@addPage')->name('adminAddPage');
    Route::post('/adminAddPageAdd','Admin\PagesAdminController@addPageAdd')->name('adminAddPageAdd');

    Route::get('/adminAddSlider','Admin\SliderAdminController@addSlider')->name('adminAddSlider');
    Route::post('/adminAddSliderAdd','Admin\SliderAdminController@addSliderAdd')->name('adminAddSliderAdd');
    Route::get('/changeFirstPicture/{id}','Admin\SliderAdminController@adminSliderChangeFirstPicture');

    Route::get('/adminAddGallery','Admin\GalleryAdminController@addGallery')->name('adminAddGallery');
    Route::post('/adminAddGalleryAdd','Admin\GalleryAdminController@addGalleryAdd')->name('adminAddGalleryAdd');

    Route::get('/adminAddUser','Admin\UserAdminController@addUser')->name('adminAddUser');
    Route::post('/adminAddUserAdd','Admin\UserAdminController@addUserAdd')->name('adminAddUserAdd');

    Route::get('/adminAddProduct','Admin\ProductAdminController@addProduct')->name('adminAddProduct');
    Route::post('/adminAddProductAdd','Admin\ProductAdminController@addProductAdd')->name('adminAddProductAdd');

    Route::get('/adminAddPoll','Admin\PollAdminController@addPoll')->name('adminAddPoll');
    Route::post('/adminAddPollAdd','Admin\PollAdminController@addPollAdd')->name('adminAddPollAdd');
    Route::get('/changeActiveQuestion/{id}','Admin\PollAdminController@changeActiveQuestion');

    Route::get('/adminDeletePage/{id}','Admin\PagesAdminController@adminDeletePage');
    Route::get('/adminDeleteSlider/{id}','Admin\SliderAdminController@adminDeleteSlider');
    Route::get('/adminDeleteGallery/{id}','Admin\GalleryAdminController@adminDeleteGallery');
    Route::get('/adminDeleteProduct/{id}','Admin\ProductAdminController@adminDeleteProduct');
    Route::get('/adminDeleteUser/{id}','Admin\UserAdminController@adminDeleteUser');
    Route::get('/adminDeletePoll/{id}','Admin\PollAdminController@deletePoll');

    Route::get('/adminEditPage/{id}','Admin\PagesAdminController@adminEditPage');
    Route::post('/adminEditPageEdit/{id}','Admin\PagesAdminController@adminEditPageEdit');

    Route::get('/adminEditUser/{id}','Admin\UserAdminController@adminEditUser');
    Route::post('/adminEditUserEdit/{id}','Admin\UserAdminController@adminEditUserEdit');

    Route::get('/adminEditProduct/{id}','Admin\ProductAdminController@adminEditProduct');
    Route::post('/adminEditProductEdit/{id}','Admin\ProductAdminController@adminEditProductEdit');

    Route::get('/adminEditPoll/{id}','Admin\PollAdminController@editPoll');
    Route::post('/adminEditPollEdit/{id}','Admin\PollAdminController@editPollEdit');
});