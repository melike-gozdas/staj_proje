<?php $__env->startSection('title', 'Haber Listesi'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
<link rel="stylesheet" href="/assets/admin/css/adminlte.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('PageAdı'); ?>
Haber Listele
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row-md-12">
  <div class="col-md-12">
    <div class="card card-outline card-info">
      <div class="card-header">
        <div class="form-group">
          <div class="row">
            <input type="text" name="a_h_baslik" class="form-control col-md-10" placeholder="Bulmak istediğiniz haber başlığını yazınız..." style="left:10px;">
            <div class="input-group-append">
              <button type="submit" name="h_search_button" class="btn btn-default" style="margin-right: 12px;">
              <i class="fas fa-search"></i>
              </button>
              <a href="/haber-ekle" title="Haber Oluştur" type="submit" name="haber_olustur" class="btn btn-success" style="margin-left: 20px;">
              <i class="fa fa-plus"></i>
              </a>

            </div>
          </div>
        </div>
        <!--
        <h4>&nbsp;Haber</h4>
        -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table border="1" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="text-align: center;">Id</th>
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
                        <a href="<?php echo e(route('haber_goruntule',$haber->id)); ?>" title="Görüntüle" class="btn btn-sm btn-primary"><i class='fa fa-eye'></i></a>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </tbody>
                </table>
                <?php echo e($haberler->links()); ?>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        
        
      </div>
      <!-- /.col-->
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tema.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melike/kbb-satj/resources/views/tema/haber_listele.blade.php ENDPATH**/ ?>