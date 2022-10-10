<?php $__env->startSection('title', 'Duyuru '.(isset($duyuru) ? 'Düzenleme': 'Ekleme')); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
<link rel="stylesheet" href="/assets/admin/css/adminlte.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/bs-stepper/css/bs-stepper.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/dropzone/min/dropzone.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/daterangepicker/daterangepicker.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="/assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="/assets/admin/plugins/toastr/toastr.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/assets/admin/dist/css/adminlte.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('PageAdı'); ?>
Duyuru <?php echo e(isset($duyuru) ? 'Düzenleme' : 'Ekleme'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('duyuru_kaydet')); ?>" method="post" enctype="multipart/form-data">
	<?php echo csrf_field(); ?>
	<div class="card card-outline card-info">
		<div class="card-header">
			<div class="form-group">
				<?php if(empty($duyuru->id)): ?>
				<input type="text" hidden name="id" value="yeni">
				<?php else: ?>
				<input type="text" hidden name="id" value="<?php echo e($duyuru->id); ?>">
				<?php endif; ?>
				<!--
				<input type="text" hidden name="id" value="yeni">
				-->
				<div class="row">
					<input type="text" name="duyuru_baslik" class="form-control col-md-10" placeholder="Duyuru başlığını yazınız..." style="left:15px;" value="<?php echo e($duyuru->baslik ?? ''); ?>">
					<div class="form-check"  style="left:50px;">
						<?php if(isset($duyuru->durum)): ?>
						<input name="duyuru_durum" class="form-check-input" type="checkbox" value="<?php echo e($duyuru->durum); ?>"
						<?php if($duyuru->durum): ?> checked <?php endif; ?> >
						
						<?php else: ?>
						<input name="duyuru_durum" class="form-check-input" type="checkbox">
						<?php endif; ?>
						<label class="form-check-label">Aktiflik Durumu</label>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="col-lg-4">
				<input type="file" class="form-control" name="image" value="<?php echo e($duyuru->resim ?? ''); ?>">
				<br>
				<?php if(isset($duyuru->resim)): ?>
				<img src="<?php echo e($duyuru->resim); ?>" width="300">
				<?php endif; ?>
			</div>
			<br>
			<div class="col-lg-10">
				<textarea id="summernote" name="duyuru_metni" value="<?php echo e($duyuru->icerik ?? ''); ?>">
				<?php if(isset($duyuru->icerik)): ?>
				<?php echo e($duyuru->icerik); ?>

				<?php else: ?>
				Bu <em>alana</em> <u>içeriği</u> <strong>yazınız...</strong>
				<?php endif; ?>
				</textarea>
			</div>
			<br>
			<div class="col-lg-4">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Tarih ve Zaman Seçimini Yapınız</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label>Başlangıç ve Bitiş Tarihi ve Zamanı:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="far fa-clock"></i></span>
								</div>
								<input type="text" name="duyuru_tarih" class="form-control float-right" id="reservationtime" value=
								<?php
								if (isset($duyuru)) {
									$duyuru->baslamaTarihi=strtotime($duyuru->baslamaTarihi);
									$duyuru->bitisTarihi=strtotime($duyuru->bitisTarihi);
								    $duyuru->baslamaTarihi=date("Y-m-d H:i:s",$duyuru->baslamaTarihi);
								    $duyuru->bitisTarihi=date("Y-m-d H:i:s",$duyuru->bitisTarihi);
								    $duyuru_tarih=[$duyuru->baslamaTarihi , $duyuru->bitisTarihi];
							        $duyuru_tarih=implode(" - ",$duyuru_tarih);
						        }
								
								?>
								"<?php echo e($duyuru_tarih ?? ''); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					&nbsp;
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
					Kaydet
					</button>
					<div class="modal fade" id="modal-success" style="display: none;" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content bg-success">
								<div class="modal-header">
									<h4 class="modal-title">Duyuru Kaydedilecek</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
									<p>Değişiklikler kaydedilsin mi?</p>
								</div>
								<div class="modal-footer justify-content-between">
									<button type="button" class="btn btn-outline-light" data-dismiss="modal">Vazgeç</button>
									<button type="submit" class="btn btn-outline-light">Kaydet</button>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			
		</div>
		
	</div>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="/assets/admin/plugins/jquery/jquery.min.js"></script>
<script src="/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/admin/plugins/select2/js/select2.full.min.js"></script>
<script src="/assets/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="/assets/admin/plugins/moment/moment.min.js"></script>
<script src="/assets/admin/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="/assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/assets/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="/assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/assets/admin/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="/assets/admin/dist/js/adminlte.min.js?v=3.2.0"></script>
<script src="/assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="/assets/admin/plugins/toastr/toastr.min.js"></script>
<script src="/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="/assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script>
$(function () {
bsCustomFileInput.init()
// Summernote
$('#summernote').summernote()
//Datemask dd/mm/yyyy
$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
//Datemask2 mm/dd/yyyy
$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
//Money Euro
$('[data-mask]').inputmask()
//Date picker
$('#reservationdate').datetimepicker({
format: 'L'
});
//Date and time picker
$('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' },
format: 'YYYY/MM/DD hh:mm A'
});
//Date range picker
$('#reservation').daterangepicker()
//Date range picker with time picker
$('#reservationtime').daterangepicker({
timePicker: true,
timePickerIncrement: 30,
locale: {
	format: 'YYYY-MM-DD hh:mm:ss'
}
});
//datepicker.data('daterangepicker').setStartDate('');
//datepicker.data('daterangepicker').setEndDate('');
//Date range as a button
$('#daterange-btn').daterangepicker(
{
ranges   : {
	'Today'       : [moment(), moment()],
	'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
	'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	'This Month'  : [moment().startOf('month'), moment().endOf('month')],
	'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
},
startDate: moment().subtract(29, 'days'),
endDate  : moment()
},
function (start, end) {
$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
}
)
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melike/kbb-satj/resources/views/admin/duyuru/duyuru_duzen.blade.php ENDPATH**/ ?>