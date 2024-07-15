<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rese</title>
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
	<?php echo $__env->yieldContent('styles'); ?>
</head>

<body>

	<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<div class="container">
		<?php echo $__env->yieldContent('content'); ?>
	</div>

</body>

</html><?php /**PATH /var/www/resources/views/layouts/app.blade.php ENDPATH**/ ?>