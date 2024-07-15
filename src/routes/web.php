<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;

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

Route::get('/', function () {
    return view('welcome');
});

// 認証ルート
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);
Route::get('/done', [UserController::class, 'done'])->name('done');

Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// ユーザールート
// Route::get('/mypage', [UserController::class, 'mypage'])->middleware('auth')->name('mypage');
Route::get('/mypage', [UserController::class, 'mypage'])->name('mypage');
Route::get('/thanks', [UserController::class, 'thanks'])->name('thanks');

// ショップ関連ルート
Route::get('/', [ShopController::class, 'index'])->name('index');
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('detail');


// お気に入り関連ルート
Route::post('/favorite', [FavoriteController::class, 'store'])->name('favorite.store');
Route::post('/favorite/{shop_id}', [FavoriteController::class, 'toggleFavorite'])->name('shop.toggleFavorite');
// Route::delete('/favorite/{id}', [FavoriteController::class, 'destroy'])->name('favorite.destroy');
Route::delete('/favorite/{shop_id}', [FavoriteController::class, 'toggleFavorite'])->name('shop.toggleFavorite');

// 予約関連ルート
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::delete('/reservation/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
