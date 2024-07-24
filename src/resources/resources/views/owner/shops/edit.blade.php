@extends('layouts.app')

@section('content')
<div class="container">
	<h1>店舗を編集</h1>
	<form action="{{ route('owner.shops.update', $shop->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="shop_name">店舗名</label>
			<input type="text" name="shop_name" id="shop_name" value="{{ $shop->shop_name }}" required>
		</div>
		<div class="form-group">
			<label for="region">地域</label>
			<input type="text" name="region" id="region" value="{{ $shop->region }}" required>
		</div>
		<div class="form-group">
			<label for="genre">ジャンル</label>
			<input type="text" name="genre" id="genre" value="{{ $shop->genre }}" required>
		</div>
		<div class="form-group">
			<label for="description">説明</label>
			<textarea name="description" id="description" required>{{ $shop->description }}</textarea>
		</div>
		<div class="form-group">
			<label for="image_URL">画像URL</label>
			<input type="text" name="image_URL" id="image_URL" value="{{ $shop->image_URL }}" required>
		</div>
		<button type="submit">更新</button>
	</form>
</div>
@endsection