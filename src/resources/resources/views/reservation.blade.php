@extends('layouts.app')

@section('content')
<div class="reservation-confirm">
	<h1>予約確認</h1>
	<p>店名: {{ $reservation->shop->shop_name }}</p>
	<p>予約日時: {{ $reservation->reservationDateTime }}</p>
	<p>人数: {{ $reservation->numberOfPeople }}</p>
	<form action="/reservation/{{ $reservation->id }}" method="POST">
		@csrf
		@method('DELETE')
		<button type="submit">キャンセルする</button>
	</form>
</div>
@endsection