<nav>
	<div class="logo">
		<h1>Rese</h1>

		<ul>
			@guest
			<li><a href="/">Home</a></li>
			<li><a href="/register">Registration</a></li>
			<li><a href="/login">Login</a></li>
			@else
			<li><a href="/">Home</a></li>
			<li><a href="/mypage">Mypage</a></li>
			<li>
				<form action="/logout" method="POST">
					@csrf
					<button type="submit">Logout</button>
				</form>
			</li>
			@endguest
		</ul>
	</div>
	<div class="search-bar">
		<input type="text" placeholder="All area">
		<input type="text" placeholder="All genre">
		<input type="text" placeholder="Search ..."> 
		<!-- <form action="{{ route('index') }}" method="GET">
			<input type="text" name="area" placeholder="All area" value="{{ request('area') }}">
			<input type="text" name="genre" placeholder="All genre" value="{{ request('genre') }}">
			<input type="text" name="keyword" placeholder="Search ..." value="{{ request('keyword') }}">
		</form> -->
	</div>
</nav>