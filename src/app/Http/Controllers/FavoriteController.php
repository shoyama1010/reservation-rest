<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\models\Shop;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
   
    public function toggleFavorite($shop_id)
    {
        $user = auth::user();
        // お気に入りの存在確認
        $favorite = Favorite::where('user_id', optional($user)->id ??'1' )->where('shop_id', $shop_id)->first();
        // $favorite = Favorite::where('user_id', $user->id )->where('shop_id', $shop_id)->first();
        if ($favorite) {
            $favorite->delete();
            return back()->with('success', 'お気に入りから削除しました。');
        } else {
            Favorite::create([
                'user_id' => optional($user)->id ??'1' ,
                // 'user_id' => $user->id ,
                'shop_id' => $shop_id,
            ]);
            return back()->with('success', 'お気に入りに追加しました。');
        }
    }

    public function searchByArea(Request $request)
    {
        $shops = Shop::where('region', 'like', '%' . $request->area . '%')->get();
        return view('shops.index', compact('shops'));
    }
}

