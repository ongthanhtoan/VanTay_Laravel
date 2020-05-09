<?php
  use App\Http\Controllers\LanguageController;

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

//Route Auth
Route::get('/dang-nhap','AuthenticationController@login');

// Route url
Route::get('/', 'DashboardController@dashboardAnalytics');

// Route Dashboards
Route::get('/dashboard-analytics', 'DashboardController@dashboardAnalytics');

//Route Người dùng
Route::get('/trang-chu', 'NguoiDungController@index');
Route::post('nguoi-dung/save-images', 'NguoiDungController@saveImages');
Route::post('nguoi-dung/get-images','NguoiDungController@getImages');
Route::post('nguoi-dung/check-van-tay','NguoiDungController@checkVanTay');
Route::post('nguoi-dung/check-van-tay-khong-ngon','NguoiDungController@checkVanTay_KhongNgon');
Route::post('nguoi-dung/tim-van-tay','NguoiDungController@timVanTay');
Route::post('nguoi-dung/thong-tin-nguoi-dung','NguoiDungController@thongTinNguoiDung');

// locale Route
Route::get('lang/{locale}',[LanguageController::class,'swap']);
