@extends('layouts.app')

@section('content')
<div class="container">
	<h1>店舗を追加</h1>
	<form action="{{ route('owner.shops.store') }}" method="POST">
		@csrf
		<div class="form-group">
			<label for="shop_name">店舗名</label>
			<input type="text" name="shop_name" id="shop_name" required>
		</div>
		<div class="form-group">
			<label for="region">地域</label>
			<input type="text" name="region" id="region" required>
		</div>
		<div class="form-group">
			<label for="genre">ジャンル</label>
			<input type="text" name="genre" id="genre" required>
		</div>
		<div class="form-group">
			<label for="description">説明</label>
			<textarea name="description" id="description" required></textarea>
		</div>
		<div class="form-group">
			<label for="image_URL">画像URL</label>
			<input type="text" name="image_URL" id="image_URL" required>
		</div>
		<button type="submit">保存</button>
	</form>
</div>
@endsection