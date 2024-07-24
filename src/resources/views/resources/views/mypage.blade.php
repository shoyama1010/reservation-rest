@extends('layouts.app')

@section('content')
<div class="mypage">
	<h1>{{ auth()->user()->name }}さんのマイページ</h1>

	<div class="reservation-favorite">

		<div class="reservation">
			<h2>予約状況</h2>
			@foreach($reservations as $reservation)
			<div class="reservation-card">
				<div class="reservation-status">
					<p>shops: {{ $reservation->shop->shop_name }}</p>
					<p>Date/Time: {{ $reservation->reservationDateTime}}</p>
					<p>peaple: {{ $reservation->numberOfPeople }}</p>

					<!-- 追加(店舗評価ページへ) -->
					<a href="{{ route('show', $reservation->shop->id) }}">店舗評価ページへ</a>

					<!-- キャンセル処理 -->
					<form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit">キャンセル</button>
					</form>
				</div>

				<!-- 予約更新（変更追加） -->
				<div class="update">
					<form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
						@csrf
						@method('PUT')
						<label for="reservationDateTime-{{ $reservation->id }}">Date</label>
						<input type="datetime-local" name="reservationDateTime" id="reservationDateTime-{{ $reservation->id }}" value="{{ $reservation->reservationDateTime }}" required>

						<label for="numberOfPeople-{{ $reservation->id }}">People</label>
						<input type="number" name="numberOfPeople" id="numberOfPeople-{{ $reservation->id }}" value="{{ $reservation->numberOfPeople }}" required>
						<button type="submit">更新</button>
					</form>
				</div>
			</div>
			@endforeach
		</div>

		<div class="favorite-conte">
			<h2>お気に入り店舗<h2>
					<!-- <div class="favorite-shops"> -->
					@foreach($favorites as $favorite)
					<div class="favorite-shops">
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
					</div> @endforeach
		</div>
	</div>
	@endsection
</div>