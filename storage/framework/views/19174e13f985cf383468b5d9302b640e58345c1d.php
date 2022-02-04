<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
          <div class="heading mt-3 mb-4">
            <h3 class="text-default weight-700">Trash Management</h3>
          </div>
          <div class="card mb-4 px-4 py-4">
            <div class="card-heading d-flex align-items-center justify-content-between mb-3 border-bottom border-dark border-solid pb-3 mb-3">
              <div class="weight-700 font-20 text-default" style="font-family: 'SFR-Semibold';color: #0000008f;font-size: 1.5rem;">Users</div>
              <div class="left d-flex col-sm-6 pr-0">
                <form class="w-100">
                  <!-- <div class="form-group my-0 flex-fill" >
                    <input class="form-control search-icon" type="search" placeholder="Search" id="searchuser">
                  </div> -->
                </form>
                <div class="justify-content-end align-items-center">
                  <a href="usermanagement" class="btn btn-primary bordered ml-2 weight-300 text-nowrap px-4" data-toggle="" data-target="#"><b>Back</b></a>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped trim" class="userinfo" id="search">
                <thead style="font-family: 'SFR-Semibold';color: #000;font-size: 1.5rem;">
                  <tr>
                    <th width="100">S.No.</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>address</th>
                    <th>Action</th>
                  </tr>
                </thead>
              <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($key+1); ?> </td>
                  <td><?php echo e($item->name); ?> </td>
                  <td><?php echo e($item->email); ?> </td>
                  <th><?php echo e($item->address); ?> </th>
                  <td>
                      <div class="action text-left">
                        <a href="<?php echo e(route('restore-user',['id'=> $item['id']])); ?>" class="mr-1"data-toggle="" data-target="#"><img src="assets/images/icons/history.png" style="height:20px;"></a>
                        <a href="<?php echo e(route('forcedelete',['id'=> $item['id']])); ?>" class="mr-1" data-toggle="modal" data-target="#forcedelete<?php echo e($item->id); ?>"><img src="assets/images/icons/delete.svg"></a>
                      </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              </table>
            </div>
          </div>
    </div>

    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  <!-- Delete Modal -->
			<div class="modal fade" id="forcedelete<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-md modal-center" role="document">
					<div class="modal-content">
						<div class="modal-body text-center my-4 py-4">
							<h3 class="text-dark font-22">Delete User</h3>
							<h6 class="text-dark mt-3">Are you sure to delete this user <?php echo e($item->name); ?> ?</h6>
							<div class="col-sm-12 mx-auto d-flex align-items-center mt-4 row">
								<div class="col-6 px-2">
									<button type="button" class="btn btn-primary btn-lg btn-block font-16" data-dismiss="modal">No</button>	
								</div>
								<div class="col-6 px-2">
									<a href="<?php echo e(route('forcedelete',['id'=> $item['id']])); ?>" type="button" class="btn btn-primary btn-lg btn-block font-16">Yes</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		<!-- Delete End Modal -->
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('after-script'); ?>
  <script type="text/javascript" >
    $(document).ready( function () {

    //datatable show
        $('#search').DataTable();

    });
  </script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layouts.master_after_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project/resources/views/Admin/Trash-user.blade.php ENDPATH**/ ?>