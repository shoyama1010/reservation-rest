<?php $__env->startSection('content'); ?>
<div class="mypage">
	<h1><?php echo e(auth()->user()->name); ?>さんのマイページ</h1>

	<div class="reservation-favorite">

		<div class="reservation">
			<!-- <h1><?php echo e(auth()->user()->name); ?>さんのマイページ</h1> -->
			<h2>予約状況</h2>
			<?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<div class="reservation-card">
				<p>shops: <?php echo e($reservation->shop->shop_name); ?></p>
				<p>DateTime: <?php echo e($reservation->reservationDateTime); ?></p>
				<p>peaple: <?php echo e($reservation->numberOfPeople); ?></p>
				<form action="<?php echo e(route('reservation.destroy', $reservation->id)); ?>" method="POST">
					<?php echo csrf_field(); ?>
					<?php echo method_field('DELETE'); ?>
					<!-- <label for="numberOfPeople">number</label>
				<input type="number" name="numberOfPeople" id="numberOfPeople" required> -->
					<button type="submit">キャンセル</button>
				</form>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

		<div class="favorite-conte">
			<h2>お気に入り店<h2>
					<?php $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favorite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<!-- お気に入り処理 -->
					<div class="favorite-card">
						<img src="<?php echo e($favorite->shop->image_url); ?>" alt="<?php echo e($favorite->shop->shop_name); ?>">
						<h4><?php echo e($favorite->shop->shop_name); ?></h4>

						<div class="contents">
							<p>#<?php echo e($favorite->shop->region); ?></p>
							<p>#<?php echo e($favorite->shop->genre); ?></p>
						</div>

						<a href="/detail/<?php echo e($favorite->shop->id); ?>">詳しくみる</a>

						<div class="favorite-section">
							<form action="<?php echo e(route('shop.toggleFavorite', $favorite->shop->id)); ?>" method="POST" class="favorite-form">
								<?php echo csrf_field(); ?>
								<?php echo method_field('DELETE'); ?>
								<button type="submit" class="favorite active">❤</button>
							</form>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
	<?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/mypage.blade.php ENDPATH**/ ?>