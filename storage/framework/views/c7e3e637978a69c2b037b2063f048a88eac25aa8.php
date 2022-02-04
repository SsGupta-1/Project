<nav class="sidebar sidebar-offcanvas" id="sidebar">
				<ul class="nav">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
							<span class="menu-title">Dashboard</span>
							<i class="mdi mdi-speedometer menu-icon"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo e(route('usermanagement')); ?>">
							<span class="menu-title">User management</span>
							<i class="mdi mdi-account-settings-variant menu-icon"></i>
						</a>
					</li>
				
					<li class="nav-item">
						<a class="nav-link" href="#">
							<span class="menu-title">User Type</span>
							<i class="mdi mdi-account-convert menu-icon"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo e(route('firebasemanagement')); ?>">
							<span class="menu-title">Firebase management</span>
							<i class="mdi mdi-account-convert menu-icon"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="collapse" href="#drop6" aria-expanded="false" aria-controls="drop6">
							<span class="menu-title">CMS</span>
							<i class="menu-arrow"></i>
							<i class="mdi mdi-file-outline menu-icon"></i>
						</a>
						<div class="collapse" id="drop6">
							<ul class="nav flex-column sub-menu">
								<li class="nav-item"><a class="nav-link" href="#">About</a></li>
								<li class="nav-item"><a class="nav-link" href="#">FAQ's</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Terms &amp; Conditions</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Privacy Policy</a></li>
							</ul>
						</div>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="<?php echo e(route('change_password')); ?>">
							<span class="menu-title">Change Password</span>
							<i class="mdi mdi-help-circle-outline menu-icon"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo e(route('logout')); ?>">
							<span class="menu-title">Logout</span>
							<i class="mdi mdi-logout menu-icon"></i>
						</a>
					</li>
				</ul>
			</nav><?php /**PATH /opt/lampp/htdocs/Project/resources/views/Admin/includes/sidebar.blade.php ENDPATH**/ ?>