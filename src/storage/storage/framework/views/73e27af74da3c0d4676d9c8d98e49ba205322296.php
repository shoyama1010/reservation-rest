<?php $__env->startSection('content'); ?>

<div class="shop-detail">

	<div class="shop-info">
		<h1><?php echo e($shop->shop_name); ?></h1>
		<img src="<?php echo e($shop->image_url); ?>" alt="<?php echo e($shop->shop_name); ?>">
		<p><?php echo e($shop->description); ?></p>
	</div>

	<div class="shop-reservation">
		<h2>予約</h2>
		<form action="/reservation" method="POST">
			<?php echo csrf_field(); ?>
			<input type="hidden" name="shop_id" value="<?php echo e($shop->id); ?>">
			<label for="reservationDateTime">Date/Time</label>
			<input type="datetime-local" name="reservationDateTime" id="reservationDateTime" required>
			<label for="numberOfPeople">number</label>
			<input type="number" name="numberOfPeople" id="numberOfPeople" required>

			<button type="submit">予約する</button>
		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/detail.blade.php ENDPATH**/ ?>