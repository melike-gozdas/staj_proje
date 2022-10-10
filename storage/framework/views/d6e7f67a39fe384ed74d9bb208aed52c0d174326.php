<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/assets/dist/css/adminlte.min.css">
  <?php echo $__env->yieldContent('css'); ?>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
  
<?php echo $__env->make('admin.widgets.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $__env->yieldContent('PageAdı'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ana Sayfa</a></li>
              <li class="breadcrumb-item active"><?php echo $__env->yieldContent('PageAdı'); ?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

<?php echo $__env->yieldContent('content'); ?>


  </div>

  
<?php echo $__env->make('admin.panels.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <aside class="control-sidebar control-sidebar-dark">
   
  </aside>

</div>

<script src="/admin/assets//plugins/jquery/jquery.min.js"></script>
<script src="/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin/assets/dist/js/adminlte.min.js"></script>
<script src="/admin/assets/dist/js/demo.js"></script>
<?php echo $__env->yieldContent('js'); ?>
</body>
</html>
<?php /**PATH /home/melike/kbb-satj/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>