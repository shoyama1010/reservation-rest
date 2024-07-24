@extends('layouts.app')

@section('content')

<div class="shop-detail">

	<div class="shop-info">
		<h1>{{ $shop->shop_name }}</h1>
		<img src="{{ $shop->image_url }}" alt="{{ $shop->shop_name }}">
		<div class="contents">
			<p>#{{ $shop->region}}</p>
			<p>#{{ $shop->genre}}</p>
		</div>
		<p>{{ $shop->description }}</p>
	</div>

	<div class="shop-reservation">
		<h2>予約</h2>
		<form action="/reservation" method="POST">
			@csrf
			<input type="hidden" name="shop_id" value="{{ $shop->id }}">
			<label for="reservationDateTime">Date/Time</label>
			<input type="datetime-local" name="reservationDateTime" id="reservationDateTime" required>
			<label for="numberOfPeople">number</label>
			<input type="number" name="numberOfPeople" id="numberOfPeople" required>

			<button type="submit">予約する</button>
		</form>
	</div>
</div>

@endsection