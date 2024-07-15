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
	<div class="search-bar">
		<input type="text" placeholder="All area">
		<input type="text" placeholder="All genre">
		<input type="text" placeholder="Search ..."> 
		<!-- <form action="<?php echo e(route('index')); ?>" method="GET">
			<input type="text" name="area" placeholder="All area" value="<?php echo e(request('area')); ?>">
			<input type="text" name="genre" placeholder="All genre" value="<?php echo e(request('genre')); ?>">
			<input type="text" name="keyword" placeholder="Search ..." value="<?php echo e(request('keyword')); ?>">
		</form> -->
	</div>
</nav><?php /**PATH /var/www/resources/views/layouts/header.blade.php ENDPATH**/ ?>