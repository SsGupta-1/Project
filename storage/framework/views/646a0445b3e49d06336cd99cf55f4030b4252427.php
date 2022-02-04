<?php $__env->startSection('content'); ?>

<?php $__env->stopSection(); ?>
  
<?php $__env->startSection('after-script'); ?>

    <script>
	    var botmanWidget = {
	        aboutText: 'ssdsd',
	        introMessage: "✋ Hi! I'm form ItSolutionStuff.com"
	    };
    </script>
  
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layouts.master_after_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Project/resources/views/Admin/helpsupport.blade.php ENDPATH**/ ?>