<!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(trans("admin.login")); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/sb-admin-2.min.css')); ?>" rel="stylesheet">

</head>
<body class="bg-gradient-primary">
    <div id="app">

        <main class="py-4">

 <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-8 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
 
              <div class="col-lg-10">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                  </div>
   
   <?php if($errors->any()): ?>

   <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
   </div>
  



   <?php endif; ?>


                  <form class="user" method="POST">

                    <?php echo csrf_field(); ?>



                                 


 <!-- ================================================================================= -->



                    <div class="form-group">

                      <input type="password" class="form-control form-control-user" id="password" placeholder="New Password" required autocomplete="current-password" name="password">


                    </div>

 <!-- ================================================================================ -->


                    <div class="form-group">

                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password Confirmation" required autocomplete="current-password" name="password_confirmation" required="">


                    </div>







<!-- ================================================================================ -->

                    <button type="submit"  class="btn btn-primary btn-user btn-block font-weight-bold">
                                      <?php echo e(__('Reset')); ?>

                    </button>
                                        
                                          <hr>
     
        
                  </form>
                

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
        </main>
    </div>


  <script src="<?php echo e(asset('admin/vendor/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo e(asset('admin/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

</body>
</html>
<?php /**PATH /home/madrid/ecommerce/resources/views/admin/reset_new_pass.blade.php ENDPATH**/ ?>