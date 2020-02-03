<?php $__env->startComponent('mail::message'); ?>
#Welcome

Password Reset Password

 
<?php echo e($data['admin']->name); ?>


<?php $__env->startComponent('mail::button', ['url' => url("dashboard/resetPassword/".$data['token'])]); ?>
Change My Password
<?php echo $__env->renderComponent(); ?>

or copy this link

<?php echo e(url("dashboard/resetPassword/".$data['token'])); ?>



Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/madrid/ecommerce/resources/views/email/admin/resetMessage.blade.php ENDPATH**/ ?>