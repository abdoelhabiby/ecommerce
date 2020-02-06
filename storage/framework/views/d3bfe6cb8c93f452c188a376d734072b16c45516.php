<!DOCTYPE html>
<html lang="<?php echo e(LaravelLocalization::getCurrentLocale()); ?>" dir="<?php echo e(LaravelLocalization::getCurrentLocaleDirection()); ?>">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $__env->yieldContent("title"); ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo e(asset('admin')); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo e(asset('admin')); ?>/css/sb-admin-2.css" rel="stylesheet">

<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
 -->
  <link href="<?php echo e(asset('admin')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link href="<?php echo e(asset('admin')); ?>/css/admin.css" rel="stylesheet">


<style type="text/css">
  
<?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?>
  div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    justify-content: flex-end !important;
}


<?php endif; ?>


</style>

</head><?php /**PATH /home/madrid/ecommerce/resources/views/admin/layouts/header.blade.php ENDPATH**/ ?>