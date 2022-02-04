
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


		<link rel="shortcut icon" href="" />
	    <style type="text/css">
	        .error{
	            color:#c93c3c;
	        }

	    </style>

  	</head>
    <body>
	  	<div class="container-scroller">
			<!-- navbar -->
			<?php echo $__env->make('Admin.includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="container-fluid page-body-wrapper">
				<!-- sidebar -->
				<?php echo $__env->make('Admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<div class="main-panel">
				<h1>This is help and support page </h1>

				<h3>You can chat with us </h3>
		    		
		    	</div>
	    	</div>
	    </div>
  		<script src="<?php echo e(asset('assets/vendors/js/vendor.bundle.base.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/datepicker.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/datatables.min.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/validate.min.js')); ?>"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="<?php echo e(asset('assets/vendors/ckeditor/ckeditor.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/sample.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/toastr.min.js')); ?>"></script>

		<script type="text/javascript">

			var botmanWidget = {
				aboutText: 'Team Backend',
				introMessage: "✋ Hi! I'm form Exprt team"
	   		 };

		</script>
		 <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
		
		 
			<?php echo $__env->make('Admin.includes.copyright', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project/resources/views/Admin/chatbot.blade.php ENDPATH**/ ?>