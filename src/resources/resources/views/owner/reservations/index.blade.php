@extends('layouts.app')

@section('content')
<div class="container">
	<h1>予約情報</h1>
	@foreach($reservations as $reservation)
	<div class="reservation-card">
		<p>店舗名: {{ $reservation->shop->shop_name }}</p>
		<p>日付: {{ $reservation->reservationDateTime }}</p>
		<p>人数: {{ $reservation->numberOfPeople }}</p>
	</div>
	@endforeach
</div>
@endsection