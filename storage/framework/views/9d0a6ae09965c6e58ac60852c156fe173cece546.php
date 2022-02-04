
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

		    		<?php echo $__env->yieldContent('content'); ?>
		    		<?php echo $__env->make('Admin.includes.copyright', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
		<script>

			// function block_unblock(user_id){
			// 	//$('.status_'+user_id).attr('checked',false);
			// 	$.ajax({

			// 			type: "post",
			// 			url: "<?php echo e(url('user_status')); ?>",
			// 			data: {'user_id': user_id},
			// 			dataType: "html",
			// 			headers: {
			// 				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			// 			},
			// 			success: function(data){
							
							
			// 			}
						
			// 	});
			// }

			// function delete_report(report_id){
			// 	var r = confirm("Are you sure want to delete this report?");
			// 	if (r == true) {
			// 		$.ajax({

			// 			type: "post",
			// 			url: "report_delete"+'/'+report_id,
			// 			data: {'report_id': report_id},
			// 			dataType: "html",
			// 			headers: {
			// 				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			// 			},
			// 			success: function(data){
			// 				$('#report_'+report_id).remove();

			// 			}

			// 		});
			// 	} 
				
			// }

			// function update_attr(){
			// 	var drop_text = $(".update_attr :selected").text();
			// 	$('.field').attr('placeholder','Type '+drop_text);

			// }

			// function user_types(type){
				
			// 	if(type == 1){
			// 		$('.for_runner').show();
			// 		$('.for_train').hide();
			// 	}else{
			// 		$('.for_runner').hide();
			// 		$('.for_train').show();

			// 	}
			// }

		</script>
		<?php echo $__env->yieldContent('after-script'); ?>
		<?php echo Toastr::message(); ?>

	</body>
</html><?php /**PATH /opt/lampp/htdocs/Project/resources/views/Admin/layouts/master_after_login.blade.php ENDPATH**/ ?>