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
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="POST" action="<?php echo e(url('dashboard/login')); ?>">

                    <?php echo csrf_field(); ?>
                    <div class="form-group">

                      <?php if(session("error_log")): ?>

                                    

                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Error</strong> <?php echo e(session('error_log')); ?>

                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>               

                      <?php endif; ?>

                      <input type="email" class="form-control form-control-user <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                                 


 <!-- ================================================================================= -->





                    </div>
                    <div class="form-group">

                      <input type="password" class="form-control form-control-user <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" placeholder="Password" required autocomplete="current-password" name="password">






 <!-- ================================================================================ -->



                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">

                        <label class="custom-control-label" for="customCheck">
                            <?php echo e(__('Remember Me')); ?>

                         </label>



<!-- ================================================================================ -->
        
                      </div>
                    </div>
                    <button type="submit"  class="btn btn-primary btn-user btn-block font-weight-bold">
                                      <?php echo e(__('Login')); ?>

                    </button>
                                        
                                          <hr>
     
        
                  </form>
                
                  <div class="text-center">

                       <?php if(Route::has('password.request')): ?>
                            <a class="btn btn-link" href="<?php echo e(url('dashboard/forgotPassword')); ?>">
                                <?php echo e(__('Forgot Your Password?')); ?>

                            </a>
                        <?php endif; ?> 
                          <hr>
                 </div>
               
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
<?php /**PATH /home/madrid/ecommerce/resources/views/admin/login.blade.php ENDPATH**/ ?>