 
<?php
    
	$adminName = getAdminName();
?> 

<nav class="navbar default-layout-navbar p-0 fixed-top d-flex flex-row">
	<div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">
		<a class="navbar-brand brand-logo" href=""><img src="<?php echo e(url('/assets/images/logo-inner.png')); ?>" alt="logo"  style="height:70px;width:170px;"></a>
		<a class="navbar-brand brand-logo-mini" href=""><img src="assets/images/logo-inner.png" alt="logo" style="height:50px;width:60px;"></a>
		<button class="navbar-toggler toggler-arrowalt align-self-center" type="button" data-toggle="minimize">
			<div class="toggler-box">
				<div class="toggler-inner"></div>
			</div>
		</button>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-center flex-fill pr-lg-0">
		<div class="text-black flex-fill">
			<h5 class="my-0 font-light">Welcome!</h5>
		</div>
		<ul class="navbar-nav navbar-nav-right">
			<li class="nav-item nav-notification mr-lg-3">
				<a href="javascript:void(0)" class="nav-link px-3 text-black font-light">
					<div class="icon mr-2"><img src="<?php echo e(url('/assets/images/icons/notification.png')); ?>"></div>
				</a>
			</li>
			<li class="nav-item nav-profile">
				<a href="" class="nav-link" id="">
					<div class="nav-profile-img">
						<img src="<?php echo e(url('/assets/images/faces/face1.jpg')); ?>" alt="image">
					</div>
					
					

				 <div class="nav-profile-text">
							<p class="mb-0"> <?php echo e($adminName->name); ?></p>
					</div> 
					
				</a>
				<?php /*<div class="dropdown-menu dropdown-menu-right" aria-labelledby="">
					<a href="" class="dropdown-item"></a>
					<a href="" class="dropdown-item"></a>
					<a href="" class="dropdown-item"></a>
				</div>*/ ?>
			</li>
		</ul>
		<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
			<span class="mdi mdi-menu"></span>
		</button>
	</div>
</nav><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project/resources/views/Admin/includes/navbar.blade.php ENDPATH**/ ?>