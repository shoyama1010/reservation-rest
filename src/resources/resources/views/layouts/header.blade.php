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

</nav>