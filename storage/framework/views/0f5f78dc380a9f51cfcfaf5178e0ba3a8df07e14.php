<?php $__env->startSection('title', 'Haber Listesi'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
<link rel="stylesheet" href="/assets/css/adminlte.min.css">
<link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<link rel="stylesheet" href="/assets/plugins/bs-stepper/css/bs-stepper.min.css">
<link rel="stylesheet" href="/assets/plugins/dropzone/min/dropzone.min.css">
<link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">

<!-- DataTables -->
<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('PageAdı'); ?>
Haber Listele
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      
      <!-- /.card -->
      <div class="card card-outline card-info">
        <div class="card-header">
          <a href="/haber-ekle" title="Haber Oluştur" type="submit" name="haber_olustur" class="btn btn-success" style="margin-left: 1360px;">
              <i >Haber Oluştur</i>
              </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="sorting" style="text-align: center;">Id</th>
                <th style="text-align: center;">Haber Başlığı</th>
                <th style="text-align: center;">Güncellenme Tarihi</th>
                <th style="text-align: center;">Aktiflik Durumu</th>
                <th style="text-align: center;">İşlemler</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $haberler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $haber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <th scope="row" style="text-align: center;"><?php echo e($haber->id); ?></th>
                <td style="text-align: center;"><?php echo e($haber->baslik); ?></td>
                <td style="text-align: center;"><?php echo e($haber->updated_at); ?></td>
                <td style="text-align: center;"><?php echo $haber->durum ==0 ? "<span class='text-danger'>Pasif </span>" : "<span class='text-success'>Aktif </span>"; ?></td>
                <td style="text-align: center;">
                  <a href="<?php echo e(route('haber_duzenle',$haber->id)); ?>" title="Düzenle" class="btn btn-sm btn-primary"><i class='fa fa-pen'></i></a>
                  <!--
                  <a href='#' title="Sil" class="btn btn-sm btn-danger"><i class='fa fa-times'></i></a>
                  -->
                  <button title="Sil" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger-<?php echo e($loop->iteration); ?>"><i class='fa fa-trash'></i></button>
                  <div class="modal fade" id="modal-danger-<?php echo e($loop->iteration); ?>" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">
                        <div class="modal-header">
                          <h4 class="modal-title">Haber Silinecek</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Silmek istediğinize emin misiniz?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Vazgeç</button>
                          <a href="<?php echo e(route('haber_sil',$haber->id)); ?>" type="button" class="btn btn-outline-light">Sil</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/plugins/jszip/jszip.min.js"></script>
<script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
$("#example1").DataTable({
"responsive": true, "lengthChange": false, "autoWidth": false,
"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melike/kbb-satj/resources/views/admin/haber/haber_listele_search.blade.php ENDPATH**/ ?>