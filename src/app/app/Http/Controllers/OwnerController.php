<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $shops = $user->shops;
        return view('owner.dashboard', compact('shops'));
    }

    public function index()
    {
        $user = Auth::user();
        $shops = $user->shops;
        return view('owner.shops.index', compact('shops'));
    }

    public function create()
    {
        return view('owner.shops.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'image_URL' => 'required|string|max:255',
        ]);

        $shop = new Shop();
        $shop->user_id = Auth::id();
        $shop->shop_name = $request->shop_name;
        $shop->region = $request->region;
        $shop->genre = $request->genre;
        $shop->description = $request->description;
        $shop->image_URL = $request->image_URL;
        $shop->save();

        return redirect()->route('owner.shops.index');
    }

    public function edit(Shop $shop)
    {
        return view('owner.shops.edit', compact('shop'));
    }

    public function update(Request $request, Shop $shop)
    {
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'image_URL' => 'required|string|max:255',
        ]);

        $shop->shop_name = $request->shop_name;
        $shop->region = $request->region;
        $shop->genre = $request->genre;
        $shop->description = $request->description;
        $shop->image_URL = $request->image_URL;
        $shop->save();

        return redirect()->route('owner.shops.index');
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->route('owner.shops.index');
    }

    public function reservations()
    {
        $user = Auth::user();
        $reservations = Reservation::whereIn('shop_id', $user->shops->pluck('id'))->get();
        return view('owner.reservations.index', compact('reservations'));
    }
}
