@extends('layouts.app')

@section('content')
<div class="container">
	<h1>管理者ダッシュボード</h1>
	<div class="dashboard-stats">
		<div class="stat">
			<h2>店舗代表者</h2>
			<p>{{ $ownerCount }}</p>
		</div>
		<div class="stat">
			<h2>利用者</h2>
			<p>{{ $userCount }}</p>
		</div>
	</div>
	<div class="dashboard-links">
		<a href="{{ route('admin.owners.index') }}">店舗代表者の管理</a>
	</div>
</div>
@endsection