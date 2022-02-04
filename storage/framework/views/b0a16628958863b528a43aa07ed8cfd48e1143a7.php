<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
          <div class="heading mt-3 mb-4">
            <h3 class="text-default weight-700">Users Management</h3>
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
                  <a href="<?php echo e(route('Trash_user')); ?> " class="btn btn-primary bordered ml-2 weight-300 text-nowrap px-4" data-toggle="" data-target="#"><b>Go to Trash</b></a>
                </div>
                <div class="justify-content-end align-items-center">
                  <a href="#" class="btn btn-primary bordered ml-2 weight-300 text-nowrap px-4" data-toggle="modal" data-target="#addUser"><b>Add User</b></a>
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
                    <th>Image</th>
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
                  <td>    <img src="<?php echo e(asset('uploads/user/'.$item->image )); ?>" height=65; width=65; alt="Loading..."></td>

                  <td><?php echo e($item->address); ?> </td>
                  <td>
                      <div class="action text-left">
                        <a href="" class="mr-1"data-toggle="modal" data-target="#viewuser<?php echo e($item->id); ?>"><img src="assets/images/icons/view.svg"></a>
                        <a href="<?php echo e(route('edit-user',['id'=> $item['id']])); ?>" class="mr-1" data-toggle="modal" data-target="#edituser<?php echo e($item->id); ?>"><img src="assets/images/icons/edit.svg"></a>
                        <a href="<?php echo e(route('delete-user',['id'=> $item['id']])); ?>" class="mr-1" data-toggle="modal" data-target="#deleteuser<?php echo e($item->id); ?>"><img src="assets/images/icons/delete.svg"></a>
                      </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              </table>
            </div>
          </div>
    </div>
 <!-- content-wrapper ends 

 ////Add user     -->

    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md-2 modal-center" role="document">
        <div class="modal-content bg-white">
          <div class="modal-body p-4">
            <div class="d-flex align-items-center justify-content-between mb-3 border-bottom border-dark border-solid pb-3 mb-3">
              <div class="weight-700 font-20 text-default" style="font-family: 'SFR-Semibold';color: #000;font-size: 1.5rem;">Add User</div>
            </div>
            <form method="post" action="<?php echo e(route('add-user')); ?>"  enctype="multipart/form-data" id="adduser">
              <?php echo csrf_field(); ?>
              <div class="form-group ">
                <label>Name</label>
                <input type="text" maxlength="30" class="form-control bg-secondary border-0 font-14 text-black" name="name" value="">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" maxlength="100" class="form-control bg-secondary border-0 font-14 text-black" name="email" value="">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file"  class="form-control bg-secondary border-0 font-14 text-black" name="image" value="">
              </div>
              <div class="form-group">
                <label>Address</label>
                <input type="text" maxlength="100" class="form-control bg-secondary border-0 font-14 text-black" name="address" value="">
              </div>
              
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  <!-- View Modal -->
  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="viewuser<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md-2 modal-center" role="document">
        <div class="modal-content bg-white">
          <div class="modal-body p-4">
            <div class="d-flex align-items-center justify-content-between mb-3 border-bottom border-dark border-solid pb-3 mb-3">
              <div class="weight-700 font-20 text-default" style="font-family: 'SFR-Semibold';color: #000;font-size: 1.5rem;">View User</div>
            </div>
          
            <div class="form-group mt-4">
              <label> Name</label>
              <input class="form-control bg-gray border-0 font-14 text-black" readonly value="<?php echo e($item->name); ?>" name="user_name">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input class="form-control bg-gray border-0 font-14 text-black" readonly value="<?php echo e($item->email); ?>" name="user_email">
            </div>
            <div class="form-group">
              <label>Address</label>
              <input class="form-control bg-gray border-0 font-14 text-black" readonly value="<?php echo e($item->address); ?>" name="user_address">
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<!-- Edit user -->
	<div class="modal fade" id="edituser<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md-2 modal-center" role="document">
			<div class="modal-content bg-white">
				<div class="modal-body p-4">
					<div class="d-flex align-items-center justify-content-between mb-3 border-bottom border-dark border-solid pb-3 mb-3">
						<div class="weight-700 font-20 text-default">Edit User</div>
					</div>
					<form action="<?php echo e(route('edit-user',['id'=> $item['id']])); ?>" method="post" enctype="multipart/form-data"  id="editVolumeForm">
						<?php echo csrf_field(); ?>
						<div class="form-group mt-4">
							<label>User Name</label>
							<input type="text" maxlength="20" class="form-control bg-secondary border-0 font-14 text-black" name="name" value="<?php echo e($item->name); ?>">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" maxlength="100" class="form-control bg-secondary border-0 font-14 text-black" name="email" value="<?php echo e($item->email); ?>">
						</div>
            <div class="form-group">
                <label>Image</label>
                <input type="file"  class="form-control bg-secondary border-0 font-14 text-black" name="image" value="">
              </div>
            <div class="form-group">
							<label>Address</label>
							<input type="text" maxlength="100" class="form-control bg-secondary border-0 font-14 text-black" name="address" value="<?php echo e($item->address); ?>">
						</div>
						<div class="d-flex align-items-center justify-content-end">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  <!-- Delete Modal -->
			<div class="modal fade" id="deleteuser<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-md modal-center" role="document">
					<div class="modal-content">
						<div class="modal-body text-center my-4 py-4">
							<h3 class="text-dark font-22">Move User to Trash</h3>
							<h6 class="text-dark mt-3">Are you sure to move <?php echo e($item->name); ?> to Trash ?</h6>
							<div class="col-sm-12 mx-auto d-flex align-items-center mt-4 row">
								<div class="col-6 px-2">
									<button type="button" class="btn btn-primary btn-lg btn-block font-16" data-dismiss="modal">No</button>	
								</div>
								<div class="col-6 px-2">
									<a href="<?php echo e(route('delete-user',['id'=> $item['id']])); ?>" type="button" class="btn btn-primary btn-lg btn-block font-16">Yes</a>
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
  <script>
    $(document).ready( function () {
      //email validation
        jQuery.validator.addMethod("validateEmail", function(value, element, param) {

        return value = value.replace(/\(|\)|\s+|-/g, ""), this.optional(element) || value.length > 5 && value.match(/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/);

        }, "Please enter a valid email address");

      //datatable show
        $('#search').DataTable();

      //adduser validation
        $("#adduser").validate({
        rules : {
          name : {
            required : true,
          },
          email:{
            required : true,
            validateEmail:true,
          },
          
        }
      });

    });
  </script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layouts.master_after_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project/resources/views/Admin/usermanagement.blade.php ENDPATH**/ ?>