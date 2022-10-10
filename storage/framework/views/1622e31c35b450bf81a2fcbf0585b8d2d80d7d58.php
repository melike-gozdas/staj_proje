<?php $__env->startSection('title', 'Haber Ekleme'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('PageAdı'); ?>
Haber Ekleme
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('haber_kaydet')); ?>" method="post">
	<?php echo csrf_field(); ?>
	<div class="card card-outline card-info">
		<div class="card-header">
			<div class="form-group">
				
				<?php if(empty($haber->id)): ?>
				<input type="text" hidden name="id" value="yeni">
				<?php else: ?>
				<input type="text" hidden name="id" value="<?php echo e($haber->id); ?>">
				<?php endif; ?>
				<!--
				<input type="text" hidden name="id" value="yeni">
			-->
				<div class="row">
					<input type="text" name="haber_baslik" class="form-control col-md-10" placeholder="Haber başlığını yazınız..." style="left:15px;" value="<?php echo e($haber->baslik ?? ''); ?>">
					<div class="form-check"  style="left:50px;">
						<input name="haber_durum" class="form-check-input" type="checkbox" value="<?php echo e($haber->aktiflikDurumu ?? ''); ?>">

						<label class="form-check-label">Aktiflik Durumu</label>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="col-lg-4">
				<div class="form-group">
					<div class="input-group">
						<div class="custom-file">
							<input name="haber_resim" type="file" class="custom-file-input" id="exampleInputFile" value="<?php echo e($haber->haberResim ?? ''); ?>">
							<label class="custom-file-label" for="exampleInputFile">Dosya Seçiniz</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-10">
				<textarea name="haber_manset" class="form-control" rows="3" placeholder="Bu alana manşeti yazınız..." value="<?php echo e($haber->manset ?? ''); ?>"></textarea>
			</div>
			<br>
			<div class="col-lg-10">
				<textarea id="summernote" name="haber_metni" value="<?php echo e($haber->haberYazisi ?? ''); ?>">
				Bu <em>alana</em> <u>içeriği</u> <strong>yazınız...</strong>
				</textarea>
			</div>
			<div class="col-lg-4">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Tarih ve Zaman Seçimini Yapınız</h3>
					</div>
					<div class="card-body">
						<!--
						<div class="form-group">
										<label>Başlangıç ve Bitiş Tarihi ve Zamanı:</label>
										<div class="input-group">
														<div class="input-group-prepend">
																		<span class="input-group-text"><i class="far fa-clock"></i></span>
														</div>
														<input type="text" class="form-control float-right" id="reservationtime">
							</div>-->
							<!-- /.input group -->
							<!--
						</div>
						-->
						<!-- Date and time -->
						<div class="form-group">
							<label>Yayınlanma Tarihi ve Zamanı:</label>
							<div class="input-group date" id="reservationdatetime" data-target-input="nearest">
								<input name="haber_tarih" type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" value="<?php echo e($haber->yayinTarihi ?? ''); ?>"/>
								<div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
						</div>
						<!-- /.form group -->
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
									<h4 class="modal-title">Haber Kaydedilecek</h4>
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
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>
<script src="/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="/assets/plugins/moment/moment.min.js"></script>
<script src="/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="/assets/plugins/dropzone/min/dropzone.min.js"></script>
<script src="/assets/dist/js/adminlte.min.js?v=3.2.0"></script>
<script src="/assets/dist/js/demo.js"></script>
<script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="/assets/plugins/toastr/toastr.min.js"></script>
<script src="/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
$(function () {
bsCustomFileInput.init();
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
$('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
//Date range picker
$('#reservation').daterangepicker()
//Date range picker with time picker
$('#reservationtime').daterangepicker({
timePicker: true,
timePickerIncrement: 30,
locale: {
	format: 'MM/DD/YYYY hh:mm A'
}
})
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
// DropzoneJS Demo Code Start
Dropzone.autoDiscover = false
// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
var previewNode = document.querySelector("#template")
previewNode.id = ""
var previewTemplate = previewNode.parentNode.innerHTML
previewNode.parentNode.removeChild(previewNode)
var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
url: "/target-url", // Set the url
thumbnailWidth: 80,
thumbnailHeight: 80,
parallelUploads: 20,
previewTemplate: previewTemplate,
autoQueue: false, // Make sure the files aren't queued until manually added
previewsContainer: "#previews", // Define the container to display the previews
clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
})
myDropzone.on("addedfile", function(file) {
// Hookup the start button
file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
})
// Update the total progress bar
myDropzone.on("totaluploadprogress", function(progress) {
document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
})
myDropzone.on("sending", function(file) {
// Show the total progress bar when upload starts
document.querySelector("#total-progress").style.opacity = "1"
// And disable the start button
file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
})
// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function(progress) {
document.querySelector("#total-progress").style.opacity = "0"
})
// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
document.querySelector("#actions .start").onclick = function() {
myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
}
document.querySelector("#actions .cancel").onclick = function() {
myDropzone.removeAllFiles(true)
}
// DropzoneJS Demo Code End
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/melike/kbb-satj/resources/views/admin/haber/haber_ekle.blade.php ENDPATH**/ ?>