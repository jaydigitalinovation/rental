<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\UserLoginController;

use App\Http\Controllers\Auth\AdminLoginController;

use App\Http\Controllers\Auth\Admin_controller;

use App\Http\Controllers\home_controller;

use App\Http\Controllers\Auth\VenderLoginController;

use App\Http\Controllers\Auth\Vender_Controller;


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

Route::get('/',[home_controller::class,'index']);

Route::get('/product/{id}',[home_controller::class,'product']);

Route::get('/product_detail/{id}',[home_controller::class,'product_detail']);

Route::get('/book_now/{id}',[home_controller::class,'book_now'])->middleware('auth');

Route::get('/category_product/{id}',[home_controller::class,'category_product']);

Route::get('/view_category/{id}',[home_controller::class,'view_category']);

Route::post('/search_product',[home_controller::class,'search_product']);

Route::get('/search_product_detail/{id}',[home_controller::class,'search_product_detail']);

Route::get('/all_category',[home_controller::class,'all_category']);



    

Route::group(['prefix'=>'user'],function(){

    Route::get('/user_login',[UserLoginController::class,'user_login'])->name('login');

    Route::get('/logout',[UserLoginController::class,'logout']);

    Route::post('/authenticate',[UserLoginController::class,'authenticate']);

    Route::get('/home',[UserLoginController::class,'home']);

    Route::get('/register',[UserLoginController::class,'register']);

    Route::post('/register_data',[UserLoginController::class,'register_data']);

    Route::post('/user_register',[UserLoginController::class,'user_register']);


    Route::get('/forget_password',[UserLoginController::class,'forget_password']);

    Route::post('/send_mail',[UserLoginController::class,'send_mail']);

    Route::get('/confirm_otp/{id}',[UserLoginController::class,'confirm_otp']);

    Route::post('/verify_otp/{id}',[UserLoginController::class,'verify_otp']);

    Route::get('/reset_password/{id}',[UserLoginController::class,'reset_password']);

    Route::post('/store_password/{id}',[UserLoginController::class,'store_password']);

    Route::get('/edit_profile/{id}',[UserLoginController::class,'edit_profile'])->middleware('auth');

    Route::post('/store_update_profile/{id}',[UserLoginController::class,'store_update_profile'])->middleware('auth');

    Route::post('/store_change_password/{id}',[UserLoginController::class,'store_change_password'])->middleware('auth');


});

Route::group(['prefix'=>'vender'],function(){

    Route::get('/logout',[VenderLoginController::class,'logout']);

    Route::post('/authenticate',[VenderLoginController::class,'authenticate']);

    Route::get('/home',[Vender_Controller::class,'home']);

    Route::get('/register',[VenderLoginController::class,'register']);

    Route::post('/register_data',[VenderLoginController::class,'register_data']);


    Route::get('/forget_password',[VenderLoginController::class,'forget_password']);

    Route::post('/send_mail',[VenderLoginController::class,'send_mail']);

    Route::get('/confirm_otp/{id}',[VenderLoginController::class,'confirm_otp']);

    Route::post('/verify_otp/{id}',[VenderLoginController::class,'verify_otp']);

    Route::get('/reset_password/{id}',[VenderLoginController::class,'reset_password']);

    Route::post('/store_password/{id}',[VenderLoginController::class,'store_password']);

    Route::get('/edit_profile',[Vender_Controller::class,'edit_profile']);

    Route::post('/store_update_profile/{id}',[Vender_Controller::class,'store_update_profile']);



    Route::get('/category',[Vender_Controller::class,'category']);



    Route::get('/product',[Vender_Controller::class,'product']);


    Route::get('/add_product_info/{id}',[Vender_Controller::class,'add_product_info']);

    Route::post('/store_add_product_info/{id}',[Vender_Controller::class,'store_add_product_info']);

    Route::get('/delete_product_data/{id}',[Vender_Controller::class,'delete_product_data']);
    
    Route::get('/update_product_data/{id}',[Vender_Controller::class,'update_product_data']);

    Route::post('/store_update_product_data/{id}',[Vender_Controller::class,'store_update_product_data']);



    Route::get('/a_product',[Vender_Controller::class,'a_product']);


    Route::get('/add_a_product_info',[Vender_Controller::class,'add_a_product_info']);

    Route::post('/subcat',[Vender_Controller::class,'subcat']);

    Route::get('/subtype',[Vender_Controller::class,'subtype']);

    Route::post('/store_add_a_product_info',[Vender_Controller::class,'store_add_a_product_info']);

    Route::get('/delete_a_product_data/{id}',[Vender_Controller::class,'delete_a_product_data']);
    
    Route::get('/update_a_product_data/{id}',[Vender_Controller::class,'update_a_product_data']);

    Route::post('/store_update_a_product_data/{id}',[Vender_Controller::class,'store_update_a_product_data']);

    Route::get('/delete_product_image/{id}',[Vender_Controller::class,'delete_product_image']);
    
    Route::get('/update_product_image/{id}',[Vender_Controller::class,'update_product_image']);

    Route::post('/store_update_product_image/{id}',[Vender_Controller::class,'store_update_product_image']);


    Route::get('/product_type',[Vender_Controller::class,'product_type']);

    Route::get('/add_product_type',[Vender_Controller::class,'add_product_type']);

    Route::post('/store_add_product_type',[Vender_Controller::class,'store_add_product_type']);

    Route::get('/delete_product_type/{id}',[Vender_Controller::class,'delete_product_type']);

    Route::get('/update_product_type/{id}',[Vender_Controller::class,'update_product_type']);

    Route::post('/store_update_product_type/{id}',[Vender_Controller::class,'store_update_product_type']);


});



Route::group(['prefix'=>'admin'],function(){

    Route::get('/admin_login',[AdminLoginController::class,'admin_login']);

    Route::get('/logout',[AdminLoginController::class,'logout']);

    Route::post('/authenticate',[AdminLoginController::class,'authenticate']);

    Route::get('/home',[Admin_controller::class,'home']);

    Route::get('/register',[AdminLoginController::class,'register']);

    Route::post('/register_data',[AdminLoginController::class,'register_data']);


    Route::get('/forget_password',[AdminLoginController::class,'forget_password']);

    Route::post('/send_mail',[AdminLoginController::class,'send_mail']);

    Route::get('/confirm_otp/{id}',[AdminLoginController::class,'confirm_otp']);

    Route::post('/verify_otp/{id}',[AdminLoginController::class,'verify_otp']);

    Route::get('/reset_password/{id}',[AdminLoginController::class,'reset_password']);

    Route::post('/store_password/{id}',[AdminLoginController::class,'store_password']);

    Route::get('/edit_profile',[Admin_controller::class,'edit_profile']);

    Route::post('/store_update_profile/{id}',[Admin_controller::class,'store_update_profile']);

    Route::post('/store_change_password/{id}',[Admin_controller::class,'store_change_password']);



    Route::get('/add_banner_info',[Admin_controller::class,'add_banner_info']);

    Route::post('/store_add_banner_info',[Admin_controller::class,'store_add_banner_info']);

    Route::get('/delete_banner_data/{id}',[Admin_controller::class,'delete_banner_data']);
    
    Route::get('/update_banner_data/{id}',[Admin_controller::class,'update_banner_data']);

    Route::post('/store_update_banner_data/{id}',[Admin_controller::class,'store_update_banner_data']);




    Route::get('/category',[Admin_controller::class,'category']);


    Route::get('/add_category_info',[Admin_controller::class,'add_category_info']);

    Route::post('/store_add_category_info',[Admin_controller::class,'store_add_category_info']);

    Route::get('/delete_category_data/{id}',[Admin_controller::class,'delete_category_data']);
    
    Route::get('/update_category_data/{id}',[Admin_controller::class,'update_category_data']);

    Route::post('/store_update_category_data/{id}',[Admin_controller::class,'store_update_category_data']);




    Route::get('/sub_category',[Admin_controller::class,'sub_category']);


    Route::get('/add_sub_category_info',[Admin_controller::class,'add_sub_category_info']);

    Route::post('/store_add_sub_category_info',[Admin_controller::class,'store_add_sub_category_info']);

    Route::get('/delete_sub_category_data/{id}',[Admin_controller::class,'delete_sub_category_data']);
    
    Route::get('/update_sub_category_data/{id}',[Admin_controller::class,'update_sub_category_data']);

    Route::post('/store_update_sub_category_data/{id}',[Admin_controller::class,'store_update_sub_category_data']);


    

    Route::get('/about',[Admin_controller::class,'about']);


    Route::get('/add_about_info',[Admin_controller::class,'add_about_info']);

    Route::post('/store_add_about_info',[Admin_controller::class,'store_add_about_info']);

    Route::get('/delete_about_data/{id}',[Admin_controller::class,'delete_about_data']);

    Route::get('/delete_selected_data',[Admin_controller::class,'delete_selected_data']);
    
    Route::get('/update_about_data/{id}',[Admin_controller::class,'update_about_data']);

    Route::post('/store_update_about_data/{id}',[Admin_controller::class,'store_update_about_data']);


});




