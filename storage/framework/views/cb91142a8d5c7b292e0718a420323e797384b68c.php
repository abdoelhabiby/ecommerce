<?php $__env->startSection("title"); ?>
<?php echo e(trans('admin.dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>

<div class="container">
 <h1>test Hala Madrid</h1>

 <?php echo auth()->guard('admin')->user()->name; ?>


</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/madrid/ecommerce/resources/views/admin/welcome.blade.php ENDPATH**/ ?>