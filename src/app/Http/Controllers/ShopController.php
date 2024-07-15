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

    
}

