<?php $__env->startSection('content'); ?>
	<div class="container-fluid page-body-wrapper full-page-wrapper login-bg">
		<div class="row flex-grow justify-content-center">
			<div class="col-sm-6 loginLeft align-items-end p-0 d-flex">
				<img src="assets/images/a.jpg" class="loginImg">
				<div class="logo-strip flex-fill text-white position-relative">
					<div class="brand-logo d-table pr-5">
						<h3 class="text-white my-0 font-weight-300 font-light">Welcome to</h3>
						<h1 class="font-medium text-uppercase mb-2"><img src="assets/images/logo1.png" alt="logo"></h1>
						<span class="separator-line width-100px d-table bg-white ml-2 my-4"></span>
						<p class="font-light mx-2 pt-1">SignIn page</p>
					</div>
				</div>
			</div>
			<div class="col-lg-6 loginRight">
				<form action="<?php echo e(route('login-post')); ?>" method="post" id="login" class="col-sm-9 m-auto">
					<?php echo csrf_field(); ?>
					<div class="fhead">
						<h3>Sign In</h3>
						<p class="h4 font-light">Hello there! SignIn here </p>
					</div>
					<div class="fbody auth-form-light text-left">
						<div class="form-field mt-5 mb-5">
							<div class="form-group over-label success">
								<input type="email" name="email" id="exampleInputEmail1" class="form-control border-bottom"  placeholder="" value="">
								<label>User Name</label>
							</div>
							<div class="form-group password-field over-label">
								<input type="password" name="password" class="form-control border-bottom" id="exampleInputPassword" placeholder="">
								<label>Password</label>
								<i class="showPassword"></i>
							</div>
						</div>
						<button class="btn btn-block btn-default btn-lg font-medium mt-4 text-uppercase">Login</button> 
						<i><p style="text-align: center">OR</p></i>
					<a href="<?php echo e(url('login/google')); ?>" class="btn btn-block btn-primary btn-md font-medium mt-4 text-uppercase">Login with Google</a>
					<a href="<?php echo e(url('login/facebook')); ?>" class="btn btn-block btn-primary btn-md font-medium mt-4 text-uppercase">Login with Facebook</a>	
	
					</div>
				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after-script'); ?>
<script type="text/javascript">
$(document).ready(function(){
  jQuery.validator.addMethod("validateEmail", function(value, element, param) {

    return value = value.replace(/\(|\)|\s+|-/g, ""), this.optional(element) || value.length > 5 && value.match(/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/);

    }, "Please enter a valid email address");



    // jQuery.validator.addMethod("lettersonly", function(value, element) {
    // return this.optional(element) || /^[a-z ]+$/i.test(value);
    // }, "Please enter alphabets only.");
   
        $("#login").validate({
          
          rules: {
            email:{
              required:true,
              validateEmail:true,
              email : true
            },
			password:{
              required:true,
              password:true
            }
          },
          messages:{
            email: {
                       required: "*Please enter email.",
                       email : "Please enter valid email."
               
           },
            password: {
                       required: "*Please enter password."
               
           }
          }
       });
});


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layouts.master_before_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Project/resources/views/index.blade.php ENDPATH**/ ?>