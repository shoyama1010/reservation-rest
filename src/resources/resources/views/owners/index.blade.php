@extends('layouts.app')

@section('content')
<div class="container">
	<h1>店舗代表者一覧</h1>
	<a href="{{ route('admin.owners.create') }}">新しい店舗代表者を追加</a>
	@foreach($owners as $owner)
	<div class="owner-card">
		<h2>{{ $owner->name }}</h2>
		<p>{{ $owner->email }}</p>
		<a href="{{ route('admin.owners.edit', $owner->id) }}">編集</a>
		<form action="{{ route('admin.owners.destroy', $owner->id) }}" method="POST">
			@csrf
			@method('DELETE')
			<button type="submit">削除</button>
		</form>
	</div>
	@endforeach
</div>
@endsection