<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;

use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;

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

// 認証登録
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
Route::get('/mypage', [UserController::class, 'mypage'])->name('mypage')->middleware('auth');

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
// 予約更新（追加機能）
Route::put('/reservation/{reservation}', [ReservationController::class, 'update'])->name('reservation.update');

Route::get('/done', [UserController::class, 'done'])->name('done');

// ５段階評価とコメント
Route::post('shops/{shop}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('shops/{shop}', [ReviewController::class, 'index'])->name('show');


// 店舗代表者関連
Route::group(['middleware' => ['auth', 'role:owner']], function () {
    Route::get('/owner/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
    Route::get('/owner/shops', [OwnerController::class, 'index'])->name('owner.shops.index');
    Route::get('/owner/shops/create', [OwnerController::class, 'create'])->name('owner.shops.create');
    Route::post('/owner/shops', [OwnerController::class, 'store'])->name('owner.shops.store');
    Route::get('/owner/shops/{shop}/edit', [OwnerController::class, 'edit'])->name('owner.shops.edit');
    Route::put('/owner/shops/{shop}', [OwnerController::class, 'update'])->name('owner.shops.update');
    Route::delete('/owner/shops/{shop}', [OwnerController::class, 'destroy'])->name('owner.shops.destroy');
    Route::get('/owner/reservations', [OwnerController::class, 'reservations'])->name('owner.reservations.index');
});

// 管理者関連
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/owners', [AdminController::class, 'index'])->name('admin.owners.index');
    Route::get('/admin/owners/create', [AdminController::class, 'create'])->name('admin.owners.create');
    Route::post('/admin/owners', [AdminController::class, 'store'])->name('admin.owners.store');
    Route::get('/admin/owners/{owner}/edit', [AdminController::class, 'edit'])->name('admin.owners.edit');
    Route::put('/admin/owners/{owner}', [AdminController::class, 'update'])->name('admin.owners.update');
    Route::delete('/admin/owners/{owner}', [AdminController::class, 'destroy'])->name('admin.owners.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['throttle:6,1'])
        ->name('verification.send');
});

