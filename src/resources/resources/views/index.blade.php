@extends('layouts.app')

@section('content')
<main>
	<div class="shop">
		<!-- 検索フォーム -->
		<div class="search-container">
			<form method="GET" action="{{ route('shop.searchByArea') }}">
				<input type="text" name="area" placeholder="All area">
				<button type="submit">検索</button>
			</form>

			<form method="GET" action="{{ route('shop.searchByGenre') }}">
				<input type="text" name="genre" placeholder="All genre">
				<button type="submit">検索</button>
			</form>
			<form method="GET" action="{{ route('shop.searchByName') }}">
				<input type="text" name="name" placeholder="Seach shop">
				<button type="submit">検索</button>
			</form>
		</div>

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
	</div>
</main>
@endsection