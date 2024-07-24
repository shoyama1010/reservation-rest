@extends('layouts.app')

@section('content')
<div class="container">
	<h1>新しい店舗代表者を追加</h1>
	<form action="{{ route('admin.owners.store') }}" method="POST">
		@csrf
		<div class="form-group">
			<label for="name">名前</label>
			<input type="text" name="name" id="name" required>
		</div>
		<div class="form-group">
			<label for="email">メールアドレス</label>
			<input type="email" name="email" id="email" required>
		</div>
		<div class="form-group">
			<label for="password">パスワード</label>
			<input type="password" name="password" id="password" required>
		</div>
		<!-- <div class="form-group">
			<label for="password_confirmation">パスワード（確認）</label>
			<input type="password" name="password_confirmation" id="password_confirmation" required>
		</div> -->
		<button type="submit">登録</button>
	</form>
</div>
@endsection