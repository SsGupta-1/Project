<?php $__env->startSection('content'); ?>
	<div class="content-wrapper">
					<div class="profile-header px-3 pb-3">
						<div class="header-bg" style="background-image: url(assets/images/title.jpg)"></div>
						<div class="profile-pic mt-5 mx-auto">
							<div class="tumbnail">
								<img src="assets/images/faces/face1.jpg" alt="avatar">
							</div>
						</div>
					</div>
					<div class="col-sm-6 mx-auto">
						<h4 class="text-center mb-3">Change Your Password</h4>
						<form class="card row forms-sample" id="change_password" method="post" action="<?php echo e(route('change_password')); ?>" novalidate="novalidate">
						<?php echo csrf_field(); ?>
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="card-body">
							<div class="form-group col-sm-12 mt-3 mb-4">
								
								<input type="password" class="form-control" name="current_password" id="current_pwd" placeholder="Current Password" required="">
							</div>
							<div class="form-group col-sm-12 mt-3 mb-4">
								<input type="password" class="form-control" name="password" id="password" placeholder="New Password" required="">
							</div>
							<div class="form-group col-sm-12 mt-3 mb-4">
								<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required="">
							</div>
							<div class="mt-3 d-flex justify-content-center">
								<button type="submit" class="btn btn-default mr-2 col-4">Submit</button>
								<a href="<?php echo e(route('dashboard')); ?>" class="btn btn-light col-4">Cancel</a>
							</div>
						</div>
					</form>
					</div>
				</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-script'); ?>
<script type="text/javascript">
$(document).ready(function(){


	$("#change_password").validate({
		rules : {
			password : {
				minlength : 4
			},
			confirm_password : {
				minlength : 4,
				equalTo : '[name="password"]'
			}
		}
	});

});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layouts.master_after_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project/resources/views/Admin/change-password.blade.php ENDPATH**/ ?>