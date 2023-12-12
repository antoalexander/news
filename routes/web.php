<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'Index']);

Route::get('news/{url}', [IndexController::class, 'news']);
Route::get('category/{url}', [IndexController::class, 'category']);

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    // Admin login 
     Route::get('login','AdminController@login');
     Route::post('admin-login','AdminController@adminLogin');

     Route::group(['middleware'=>['admin']],function(){
      //Admin Dashboard 
      Route::get('dashboard','AdminController@dashboard');
      
      //Admin Logout
      Route::get('logout','AdminController@logout');

      //Menu
      Route::get('manage-menu','MenuController@manageMenu');
      Route::post('update-menu-order','MenuController@updateMenuOrder'); 
      Route::get('add-menu','MenuController@addMenu');
      Route::post('store-menu','MenuController@storeMenu');
      Route::get('edit-menu/{id}','MenuController@editMenu');
      Route::post('update-menu','MenuController@updateMenu');
      Route::post('update-menu-status','MenuController@updateMenuStatus');
      Route::get('delete-menu/{id}','MenuController@deleteMenu');
      
      //news
      Route::get('all-news','NewsController@allNews');
      Route::get('add-news','NewsController@addNews');
      Route::post('store-news','NewsController@storeNews');
      Route::get('edit-news/{id}','NewsController@editNews');
      Route::post('update-news','NewsController@updateNews');
      Route::post('update-news-status','NewsController@updateNewsStatus');
      Route::post('update-latest-news-status','NewsController@updateLatestNewsStatus');
      Route::post('update-banner-status','NewsController@updateBannerStatus');
      Route::post('update-popular-status','NewsController@updatePopularStatus');
      Route::post('update-trending-status','NewsController@updateTrendingStatus');
      Route::get('delete-news/{id}','NewsController@deleteNews');
      
      //add news video
      Route::get('all-video','NewsController@allVideo');
      Route::get('add-video','NewsController@addVideo');
      Route::post('store-video','NewsController@storeVideo');
      Route::get('edit-video/{id}','NewsController@editVideo');
      Route::post('update-video','NewsController@updateVideo');
      Route::post('update-video-status','NewsController@updateVideoStatus');
      Route::get('delete-video/{id}','NewsController@deleteVideo');
   
     });

});

