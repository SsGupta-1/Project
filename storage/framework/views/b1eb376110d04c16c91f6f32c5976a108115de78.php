<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="heading mt-3 mb-4">
        <h3 class="text-default weight-700">Dashboard</h3>
    </div>

    <div class="row mx-n2">
        <div class="col-md-4 px-4 ">
            <div class="card bg-primary ">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="left">
                        <h4 class="font-weight-normal mb-4">Total Users</h4>
                        <h3 class="mb-4"><?php echo e($usercount); ?></h3>
                    </div>
                    <img src="https://img.icons8.com/glyph-neue/64/000000/user-group-man-man.png"/>
                </div>
            </div>
        </div>

        <div class="col-md-4 px-4 ">
            <div class="card bg-secondary ">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="left">
                        <h4 class="font-weight-normal mb-4">Total Users</h4>
                        <h3 class="mb-4"><?php echo e($usercount); ?></h3>
                    </div>
                    <img src="https://img.icons8.com/ios/50/000000/checked-user-male.png"/>
                </div>
            </div>
        </div>
    </div>          
</div> 


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layouts.master_after_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project/resources/views/Admin/dashboard.blade.php ENDPATH**/ ?>