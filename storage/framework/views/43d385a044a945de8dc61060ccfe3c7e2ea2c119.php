<?php $__env->startSection('title', 'Alt Başlık'); ?>

<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="admin/assets/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="admin/assets/dist/css/adminlte.min.css">
<link rel="stylesheet" href="admin/assets/plugins/summernote/summernote-bs4.min.css">

<!-- iremin linkler -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/assets/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/admin/assets/plugins/summernote/summernote-bs4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="/admin/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="/admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/admin/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="/admin/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="/admin/assets/plugins/bs-stepper/css/bs-stepper.min.css">

  <link rel="stylesheet" href="/admin/assets/dist/css/adminlte.min.css?v=3.2.0">

  <!-- dropzonejs -->
  <link rel="stylesheet" href="/admin/assets/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/assets/dist/css/adminlte.min.css">

<!-- iremin linkler -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('PageAdı', 'Alt Başlık'); ?>

<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('alt-baslik-kaydet')); ?>" method="post">
  <?php echo csrf_field(); ?>

    <div class="container-fluid">

    <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ekle">
            </div>
      
      <div class="card">
        <div class="card-body row">

          <div class="col-7">

            <div class="form-group">
                <input type="text" name="kategori_id" hidden value="<?php echo e($kategori->id); ?>">
              <label for="inputName">Kategori Adı</label>
              <input type="text" name="adi" id="inputName" class="form-control" value= "<?php echo e($kategori->adi); ?>" />
            </div>

            <div class="form-group">
            <input type="hidden" name="Grup_id" value="$kategori->id">  
            <label for="inputEmail">Sayfa Adı</label>
            <input type="text" name="sayfaBaslik" class="form-control" placeholder="Alt başlık giriniz"  value="">
            </div>
            
            

          </div>

        </div>
    
      </div>

      <div class="row">
        <div class="col-md-12">
      <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                İçerik Ekle
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <textarea id="summernote" name="sayfaIcerik" value="<?php echo e($proje->pYazisi ?? ''); ?>" ><?php echo e($proje->pYazisi ?? ''); ?>

               
              </textarea>
            </div>
          </div>
        </div>
        </div>

    </div>
  
</form>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

<!-- iremin linkler -->
<script src="/admin/assets/plugins/jquery/jquery.min.js"></script>
<script src="/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin/assets/plugins/select2/js/select2.full.min.js"></script>
<script src="/admin/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="/admin/assets/plugins/moment/moment.min.js"></script>
<script src="/admin/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="/admin/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="/admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/admin/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="/admin/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="/admin/assets/plugins/dropzone/min/dropzone.min.js"></script>
<script src="/admin/assets/dist/js/adminlte.min.js?v=3.2.0"></script>
<script src="/admin/assets/dist/js/demo.js"></script>
<script src="/admin/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="/admin/assets/plugins/toastr/toastr.min.js"></script>
<script src="/admin/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="/admin/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/admin/assets/dist/js/adminlte.min.js"></script>
<script src="/admin/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- iremin linkler -->
<script src="admin/aadmin/assets/plugins/jquery/jquery.min.js"></script>

<script src="admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="admin/assets/dist/js/adminlte.min.js"></script>

<script src="admin/assets/dist/js/demo.js"></script>

<script src="/admin/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script >
$(function () {
// Summernote
$('#summernote').summernote()});
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melike/kbb-satj/resources/views/admin/pages/alt_baslik_ekle.blade.php ENDPATH**/ ?>