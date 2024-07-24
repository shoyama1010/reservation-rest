@extends('layouts.app')

@section('content')
<div class="container">
	<h1>店舗一覧</h1>
	<a href="{{ route('owner.shops.create') }}">店舗を追加</a>
	@foreach($shops as $shop)
	<div class="shop-card">
		<h2>{{ $shop->shop_name }}</h2>
		<p>{{ $shop->description }}</p>
		<a href="{{ route('owner.shops.edit', $shop->id) }}">編集</a>
		<form action="{{ route('owner.shops.destroy', $shop->id) }}" method="POST">
			@csrf
			@method('DELETE')
			<button type="submit">削除</button>
		</form>
	</div>
	@endforeach
</div>
@endsection