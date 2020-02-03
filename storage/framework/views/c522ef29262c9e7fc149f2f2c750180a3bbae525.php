<?php $__env->startSection('title'); ?>
 <?php echo e(trans('admin.adminPanel')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>

<div class="container">

	<table class="table" id="myTable">
		 <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
		
	</table>

</div>


<?php $__env->startPush('scripts'); ?>
<script>
$(function() {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo route('datatables.data'); ?>',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/madrid/ecommerce/resources/views/admin/dataTables/home.blade.php ENDPATH**/ ?>