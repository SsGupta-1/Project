<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
      	<meta name="base_url" content="<?php echo e(url('/')); ?>">
	    <title>SsGupta</title>
	    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/mdi/css/materialdesignicons.min.css')); ?>">
	    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/css/vendor.bundle.base.css')); ?>">
	    <link rel="stylesheet" href="<?php echo e(asset('assets/css/datatables.min.css')); ?>">
	    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
	    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	    <link rel="stylesheet" href="<?php echo e(asset('assets/css/toastr.min.css')); ?>">
	    <link rel="shortcut icon" href="" />
    </head>
    <body>
		<?php echo $__env->yieldContent('content'); ?>
		<script src="<?php echo e(asset('assets/vendors/js/vendor.bundle.base.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/datepicker.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/datatables.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/validate.min.js')); ?>"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="<?php echo e(asset('assets/vendors/ckeditor/ckeditor.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/sample.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/toastr.min.js')); ?>"></script>
		<?php echo $__env->yieldContent('after-script'); ?>
		<?php echo Toastr::message(); ?>

	</body>
</html><?php /**PATH /opt/lampp/htdocs/Project/resources/views/Admin/layouts/master_before_login.blade.php ENDPATH**/ ?>