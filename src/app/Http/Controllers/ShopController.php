<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('index', compact('shops'));
    }

    public function detail($shop_id)
    {
        $shop = Shop::findOrFail($shop_id);
        return view('detail', compact('shop'));
    }

    // 検索処理
    public function searchByArea(Request $request)
    {
        $shops = Shop::where('region', 'like', '%' . $request->area . '%')->get();
        return view('index', compact('shops'));
    }

    public function searchByGenre(Request $request)
    {
        $shops = Shop::where('genre', 'like', '%' . $request->genre . '%')->get();
        return view('index', compact('shops'));
    }

    public function searchByName(Request $request)
    {
        $shops = Shop::where('name', 'like', '%' . $request->name . '%')->get();
        return view('index', compact('shops'));
    }
    
}

