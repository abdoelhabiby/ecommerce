  <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo e(url('dashboard/logout')); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  
  <script src="<?php echo e(asset('admin/vendor/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>


  <!-- Core plugin JavaScript-->
  <script src="<?php echo e(asset('admin/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

  <!-- Custom scripts for all pages-->

  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

  <script src="<?php echo e(asset('admin/js/sb-admin-2.min.js')); ?>"></script>

  <!-- Page level plugins -->
<!--   <script src="<?php echo e(asset('admin')); ?>/vendor/chart.js/Chart.min.js"></script>
 -->
  <!-- Page level custom scripts -->
<!--   <script src="<?php echo e(asset('admin')); ?>/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo e(asset('admin')); ?>/js/demo/chart-pie-demo.js"></script> -->

<!--    // <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
 -->

<!-- ============================= from template sb admin file tables =================== -->
  <script src="<?php echo e(asset('admin')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo e(asset('admin')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>


  <script src="https://cdn.datatables.net/rowreorder/1.2.6/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>


<!-- <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> -->

  <!-- Page level custom scripts -->
  <script src="<?php echo e(asset('admin')); ?>/js/demo/datatables-demo.js"></script>

<!-- ============================================================================================ -->
<script type="text/javascript" src="<?php echo e(asset('plugins/ckeditor/ckeditor.js')); ?>"></script>


  <script src="<?php echo e(asset('admin')); ?>/js/admins.js"></script>

<script type="text/javascript">
  $(function(){


   $(".buttons-create").addClass("btn btn-primary").removeClass("dt-button");
   $(".buttons-export").addClass("btn btn-secondary").removeClass("dt-button");
   $(".buttons-print").addClass("btn btn-success").removeClass("dt-button");
   $(".buttons-reset").addClass("btn btn-danger").removeClass("dt-button");
   $(".buttons-reload").addClass("btn btn-dark").removeClass("dt-button");

   $(".dt-buttons a").css({"marginRight" : "10px"});
   $(".dt-buttons").css({"marginBottom" : "10px"});


   $(".dataTables_filter input").css({"borderRadius" : "5px","outline" : 0});

    var lang = "<?php echo e(langLocal() == 'ar' ? 'ar':''); ?>";

if(lang == 'ar'){

var create = `<i class='fa fa-plus'></i>`;
var export_b = `<i class='fa fa-download'></i>`;
var print_b = `<i class='fa fa-print'></i>`;
var reset = `<i class='fa fa-undo'></i>`;
var reload = `<i class='fa fa-refresh'></i>`;

   $(".buttons-create span").html(create + " <?php echo e(trans('admin.create_btn')); ?>");
   $(".buttons-export span").html(export_b + " <?php echo e(trans('admin.export_btn')); ?>");
   $(".buttons-print span").html(print_b + " <?php echo e(trans('admin.print_btn')); ?>");
   $(".buttons-reset span").html(reset + " <?php echo e(trans('admin.reset_btn')); ?>");
   $(".buttons-reload span").html(reload + " <?php echo e(trans('admin.reload_btn')); ?>");



}
  });
</script>

<?php echo $__env->yieldPushContent("scripts"); ?>



</body>

</html>
<?php /**PATH /home/madrid/ecommerce/resources/views/admin/layouts/footer.blade.php ENDPATH**/ ?>