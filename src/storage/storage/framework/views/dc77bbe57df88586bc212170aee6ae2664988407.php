<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>店舗予約システム</title>
	<link rel="stylesheet" href="<?php echo e(asset('css/header.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/modal.css')); ?>">
</head>

<body>
	<header>
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
		</nav>
	</header>

	<!-- Login Modal -->
	<div id="login-modal" class="modal">
		<div class="modal-content">
			<span class="close" id="close-login-modal">&times;</span>
			<h2>Login</h2>
			<form method="POST" action="<?php echo e(route('login')); ?>">
				<?php echo csrf_field(); ?>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" id="email" name="email" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" required>
				</div>
				<button type="submit">Login</button>
			</form>
		</div>
	</div>

	<!-- Register Modal -->
	<div id="register-modal" class="modal">
		<div class="modal-content">
			<span class="close" id="close-register-modal">&times;</span>
			<h2>Register</h2>
			<form method="POST" action="<?php echo e(route('register')); ?>">
				<?php echo csrf_field(); ?>
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" id="email" name="email" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" required>
				</div>
				<button type="submit">Register</button>
			</form>
		</div>
	</div>
	<script src="<?php echo e(asset('js/modal.js')); ?>"></script>
</body><?php /**PATH /var/www/resources/views/layouts/header.blade.php ENDPATH**/ ?>