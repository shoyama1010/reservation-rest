@extends('layouts.app')

@section('content')
<div class="auth-container">
	<h1>Login</h1>
	<form action="{{ route('login') }}" method="POST">
		@csrf
		<div class="form-group">
			<!-- <label for="email">Email</label> -->
			<input type="email" name="email" id="email" required placeholder="Email"/>
		</div>
		<div class="form-group">
			<!-- <label for="password">Password</label> -->
			<input type="password" name="password" id="password" required placeholder="Password" />
		</div>
		<button type="submit">ログイン</button>
	</form>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection