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
Route::post('/register', [UserController::class, 'store'])->name('register.store');
// 登録完了
Route::get('/thanks', [UserController::class, 'thanks'])->name('thanks');
// ログイン
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
// ログアウト
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
// ユーザールート
// Route::get('/mypage', [UserController::class, 'mypage'])->middleware('auth')->name('mypage');
// マイページ
Route::get('/mypage', [UserController::class, 'mypage'])->name('mypage');

// ショップ関連ルート
Route::get('/', [ShopController::class, 'index'])->name('index');
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('detail');

// お気に入り（入れ）
Route::post('/favorite', [FavoriteController::class, 'store'])->name('favorite.store');
Route::post('/favorite/{shop_id}', [FavoriteController::class, 'toggleFavorite'])->name('shop.toggleFavorite');
// お気に入り（削除）
Route::delete('/favorite/{shop_id}', [FavoriteController::class, 'toggleFavorite'])->name('shop.toggleFavorite');

// 検索ルート
Route::get('/search/area', [ShopController::class, 'searchByArea'])->name('shop.searchByArea');
Route::get('/search/genre', [ShopController::class, 'searchByGenre'])->name('shop.searchByGenre');
Route::get('/search/name', [ShopController::class, 'searchByName'])->name('shop.searchByName');
// 予約作成
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
// 予約キャンセル
Route::delete('/reservation/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
// 予約更新
Route::put('/reservation/{reservation}', [ReservationController::class, 'update'])->name('reservation.update');