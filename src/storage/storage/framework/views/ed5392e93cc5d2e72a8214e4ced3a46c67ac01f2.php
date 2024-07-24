<?php $__env->startSection('content'); ?>
<div class="mypage">
	<h1><?php echo e(auth()->user()->name); ?>さんのマイページ</h1>

	<div class="reservation-favorite">

		<div class="reservation">
			<h2>予約状況</h2>
			<?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="reservation-card">
				<div class="reservation-status">
					<p>shops: <?php echo e($reservation->shop->shop_name); ?></p>
					<p>Date/Time: <?php echo e($reservation->reservationDateTime); ?></p>
					<p>peaple: <?php echo e($reservation->numberOfPeople); ?></p>

					<!-- 追加(店舗評価ページへ) -->
					<a href="<?php echo e(route('show', $reservation->shop->id)); ?>">店舗評価ページへ</a>

					<!-- キャンセル処理 -->
					<form action="<?php echo e(route('reservation.destroy', $reservation->id)); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<?php echo method_field('DELETE'); ?>
						<button type="submit">キャンセル</button>
					</form>
				</div>

				<!-- 予約更新（変更追加） -->
				<div class="update">
					<form action="<?php echo e(route('reservation.update', $reservation->id)); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<?php echo method_field('PUT'); ?>
						<label for="reservationDateTime-<?php echo e($reservation->id); ?>">Date</label>
						<input type="datetime-local" name="reservationDateTime" id="reservationDateTime-<?php echo e($reservation->id); ?>" value="<?php echo e($reservation->reservationDateTime); ?>" required>

						<label for="numberOfPeople-<?php echo e($reservation->id); ?>">People</label>
						<input type="number" name="numberOfPeople" id="numberOfPeople-<?php echo e($reservation->id); ?>" value="<?php echo e($reservation->numberOfPeople); ?>" required>
						<button type="submit">更新</button>
					</form>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

		<div class="favorite-conte">
			<h2>お気に入り店舗<h2>
					<!-- <div class="favorite-shops"> -->
					<?php $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favorite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="favorite-shops">
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
					</div> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
	<?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/mypage.blade.php ENDPATH**/ ?>