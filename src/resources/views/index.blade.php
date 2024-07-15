@extends('layouts.app')

@section('content')
<main>

	<!-- 店舗詳細 -->
	<div class="shop-list">
		@foreach($shops as $shop)

		<div class="shop-card">
			<img src="{{ $shop->image_url }}" alt="{{ $shop->shop_name }}">
			<h2>{{ $shop->shop_name }}</h2>
			<div class="contents">
				<p>#{{ $shop->region}}</p>
				<p>#{{ $shop->genre}}</p>
			</div>
			<!-- 予約詳細へ -->
			<a href="/detail/{{ $shop->id }}">詳しくみる</a>

			<!-- お気に入り処理 -->
			<div class="favorite-section">
				<form action="{{ route('shop.toggleFavorite', $shop->id) }}" method="POST" class="favorite-form">
					@csrf

					<button type="submit" class="favorite">♡</button>

				</form>
			</div>
		</div>
		@endforeach
	</div>
</main>
@endsection