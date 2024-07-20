<?php $__env->startSection('content'); ?>
<div class="auth-container">
	<h1>Registration</h1>
	<form action="<?php echo e(route('register')); ?>" method="POST">
		<?php echo csrf_field(); ?>
		<div class="form-group">
			<!-- <label for="name">Username</label> -->
			<input type="text" name="name" id="name" required placeholder="Username" />
		</div>
		<div class="form-group">
			<!-- <label for="email">Email</label> -->
			<input type="email" name="email" id="email" required placeholder="Email"/>
		</div>
		<div class="form-group">
			<!-- <label for="password">Password</label> -->
			<input type="password" name="password" id="password" required placeholder="Password" />
		</div>
		<button type="submit">登録</button>
	</form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/auth.css')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/auth/register.blade.php ENDPATH**/ ?>