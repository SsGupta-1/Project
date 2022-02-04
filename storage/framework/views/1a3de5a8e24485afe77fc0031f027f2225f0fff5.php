<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
          <div class="heading mt-3 mb-4">
            <h3 class="text-default weight-700">Firebase Management</h3>
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
                  <a href="" class="btn btn-primary bordered ml-2 weight-300 text-nowrap px-4" data-toggle="modal" data-target="#addstudent"><b>Add student</b></a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped trim" class="userinfo" id="firebasetable">
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
                  <?php 
                  $Sno =1;
                  ?>

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($Sno++); ?> </td>
                  <td><?php echo e($item['name']); ?> </td>
                  <td><?php echo e($item['email']); ?> </td>
                  <th><?php echo e($item['address']); ?> </th>
                  <td>
                      <div class="action text-left">
                        <a href="" class="mr-1"data-toggle="modal" data-target=""><img src="assets/images/icons/view.svg"></a>
                        <a href="#" class="mr-1" data-toggle="modal" ><img src="assets/images/icons/edit.svg"></a>
                        <a href="#" class="mr-1" data-toggle="modal" data-target=""><img src="assets/images/icons/delete.svg"></a>
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

        Add user     -->

    <div class="modal fade" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md-2 modal-center" role="document">
        <div class="modal-content bg-white">
          <div class="modal-body p-4">
            <div class="d-flex align-items-center justify-content-between mb-3 border-bottom border-dark border-solid pb-3 mb-3">
              <div class="weight-700 font-20 text-default" style="font-family: 'SFR-Semibold';color: #000;font-size: 1.5rem;">Add Student</div>
            </div>
            <form method="post" action="<?php echo e(url('add-student')); ?>" id="add-student">
              <?php echo csrf_field(); ?>
              <div class="form-group ">
                <label>Name</label>
                <input type="text" maxlength="30" class="form-control bg-secondary border-0 font-14 text-black" name="name" id="name" value="">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" maxlength="100" class="form-control bg-secondary border-0 font-14 text-black" name="email" id="email" value="">
              </div>
              <div class="form-group">
                <label>Address</label>
                <input type="text" maxlength="100" class="form-control bg-secondary border-0 font-14 text-black" name="address" id="address" value="">
              </div>
              
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-script'); ?>
  <script>
    $(document).ready( function () {

        //datatable show
            $('#firebasetable').DataTable();

        //addstudent validation
        $("#add-student").validate({
            rules : {
            name : {
                required : true,    
            },
            email:{ 
                required : true,
                //validateEmail:true,
            },
            
            }
        });
    });
 </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layouts.master_after_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project/resources/views/firebase/firebasemanagement.blade.php ENDPATH**/ ?>