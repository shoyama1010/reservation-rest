@extends('layouts.app')

@section('content')
<div class="container">
	<h1>店舗代表者情報を編集</h1>
	<form action="{{ route('admin.owners.update', $owner->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="name">名前</label>
			<input type="text" name="name" id="name" value="{{ $owner->name }}" required>
		</div>
		<div class="form-group">
			<label for="email">メールアドレス</label>
			<input type="email" name="email" id="email" value="{{ $owner->email }}" required>
		</div>
		<div class="form-group">
			<label for="password">パスワード（変更しない場合は空白のまま）</label>
			<input type="password" name="password" id="password">
		</div>
		<!-- <div class="form-group">
			<label for="password_confirmation">パスワード（確認）</label>
			<input type="password" name="password_confirmation" id="password_confirmation">
		</div> -->
		<button type="submit">更新</button>
	</form>
</div>
@endsection