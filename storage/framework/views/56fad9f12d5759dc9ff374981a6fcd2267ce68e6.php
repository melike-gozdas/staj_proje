<?php $__env->startSection('title', 'Proje Listesi'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
<link rel="stylesheet" href="/assets/css/adminlte.min.css">
<link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('PageAdı'); ?>
Proje Listele
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <div class="row-md-12">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <div class="form-group">
            <div class="row">
              <input type="text" name="a_p_baslik" class="form-control col-md-10" placeholder="Bulmak istediğiniz proje başlığını yazınız..." style="left:10px;">
              <div class="input-group-append">
                <button type="submit" name="p_search_button" class="btn btn-default" style="margin-right: 12px;">
                <i class="fas fa-search"></i>
                </button>
                <a href="/proje-ekle" title="Proje OLuştur" type="submit" name="haber_olustur" class="btn btn-success" style="margin-left: 20px;">
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
                        <th name="p_id" style="text-align: center;">Id</th>
                        <th name="p_baslik" style="text-align: center;">Proje Başlığı</th>
                        <th name="pGuncellemeTarihi" style="text-align: center;">Güncellenme Tarihi</th>
                        <th name="p_aktif" style="text-align: center;">Proje Durumu</th>
                        <th name="p_islem" style="text-align: center;">İşlemler</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $projeler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proje): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <th scope="row" style="text-align: center;"><?php echo e($proje->id); ?></th>
                        <td style="text-align: center;"><?php echo e($proje->pAdi); ?></td>
                        <td style="text-align: center;"><?php echo e($proje->updated_at); ?></td>

                        <td style="text-align: center;"><?php echo $proje->pKategoriAdi ==0 ? "<span class='text-danger'>Pasif </span>" : "<span class='text-success'>Aktif </span>"; ?></td>
                        <td style="text-align: center;">
                          <a href="<?php echo e(route('ProjeDüzenle',$proje->id)); ?>" title="Düzenle" class="btn btn-sm btn-primary"><i class='fa fa-pen'></i></a>
                          <button title="Sil" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger-<?php echo e($loop->iteration); ?>"><i class='fa fa-trash'></i></button>
                          <div class="modal fade" id="modal-danger-<?php echo e($loop->iteration); ?>" style="display: none;" aria-hidden="true">
                          <a href='#' title="Düzenle" class="btn btn-sm btn-primary"><i class='fa fa-pen'></i></a>
                          <button title="Sil" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger"><i class='fa fa-trash'></i></button>
                          <div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content bg-danger">
                                <div class="modal-header">
                                  <h4 class="modal-title">Proje Silinecek</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Silmek istediğinize emin misiniz?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-outline-light" data-dismiss="modal">Vazgeç</button>
                                  <a href="<?php echo e(route('ProjeSil',$proje->id)); ?>" type="button" class="btn btn-outline-light">Sil</a>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
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
          </div>
          
          
        </div>
        <!-- /.col-->
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melike/kbb-satj/resources/views/admin/proje/proje_listele.blade.php ENDPATH**/ ?>