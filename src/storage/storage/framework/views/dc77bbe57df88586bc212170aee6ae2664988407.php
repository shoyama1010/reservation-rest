<nav>
	<div class="logo">
		<h1>Rese</h1>
		<ul>
			<?php if(auth()->guard()->guest()): ?>
			<li><a href="/">Home</a></li>
			<li><a href="/register">Registration</a></li>
			<li><a href="/login">Login</a></li>
			<?php else: ?>
			<li><a href="/">Home</a></li>
			<li><a href="/mypage">Mypage</a></li>
			<li>
				<form action="/logout" method="POST">
					<?php echo csrf_field(); ?>
					<button type="submit">Logout</button>
				</form>
			</li>
			<?php endif; ?>
		</ul>
	</div>

</nav><?php /**PATH /var/www/resources/views/layouts/header.blade.php ENDPATH**/ ?>