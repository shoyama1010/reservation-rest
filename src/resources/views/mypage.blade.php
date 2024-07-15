@extends('layouts.app')

@section('content')
<div class="mypage">
	<h1>{{ auth()->user()->name }}さんのマイページ</h1>

	<div class="reservation-favorite">

		<div class="reservation">
			<!-- <h1>{{ auth()->user()->name }}さんのマイページ</h1> -->
			<h2>予約状況</h2>
			@foreach($reservations as $reservation)

			<div class="reservation-card">
				<p>shops: {{ $reservation->shop->shop_name }}</p>
				<p>DateTime: {{ $reservation->reservationDateTime}}</p>
				<p>peaple: {{ $reservation->numberOfPeople }}</p>
				<form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST">
					@csrf
					@method('DELETE')
					<!-- <label for="numberOfPeople">number</label>
				<input type="number" name="numberOfPeople" id="numberOfPeople" required> -->
					<button type="submit">キャンセル</button>
				</form>
			</div>
			@endforeach
		</div>

		<div class="favorite-conte">
			<h2>お気に入り店<h2>
					@foreach($favorites as $favorite)
					<!-- お気に入り処理 -->
					<div class="favorite-card">
						<img src="{{ $favorite->shop->image_url }}" alt="{{ $favorite->shop->shop_name }}">
						<h4>{{ $favorite->shop->shop_name }}</h4>

						<div class="contents">
							<p>#{{ $favorite->shop->region}}</p>
							<p>#{{ $favorite->shop->genre}}</p>
						</div>

						<a href="/detail/{{ $favorite->shop->id }}">詳しくみる</a>

						<div class="favorite-section">
							<form action="{{ route('shop.toggleFavorite', $favorite->shop->id) }}" method="POST" class="favorite-form">
								@csrf
								@method('DELETE')
								<button type="submit" class="favorite active">❤</button>
							</form>
						</div>
					</div>
					@endforeach
		</div>
	</div>
	@endsection
</div>