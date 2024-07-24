<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Shop;

class ReviewController extends Controller
{
	public function store(Request $request, $shopId)
	{
		$request->validate([
			'rating' => 'required|integer|min:1|max:5',
			'comment' => 'nullable|string',
		]);

		Review::create([
			'user_id' => auth()->id(),
			'shop_id' => $shopId,
			'rating' => $request->rating,
			'comment' => $request->comment,
		]);

		return redirect()->route('show', $shopId)->with('success', 'レビューが保存されました。');
	}

	public function index($shopId)
	{
		$shop = Shop::findOrFail($shopId);
		$reviews = $shop->reviews()->with('user')->get();

		return view('show', compact('shop', 'reviews'));
	}
}
