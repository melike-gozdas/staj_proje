@extends('admin.layouts.master')
@section('title', 'Haber '.(isset($haber) ? 'Düzenleme': 'Ekleme'))
@section('css')
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
@endsection
@section('PageAdı')
Haber {{isset($haber) ? 'Düzenleme' : 'Ekleme'}}
@endsection
@section('content')
<form action="{{route('haber_kaydet')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="card card-outline card-info">
		<div class="card-header">
			<div class="form-group">
				
				@if(empty($haber->id))
				<input type="text" hidden name="id" value="yeni">
				@else
				<input type="text" hidden name="id" value="{{$haber->id}}">
				@endif
				<!--
				<input type="text" hidden name="id" value="yeni">
				-->
				<div class="row">
					<input type="text" name="haber_baslik" class="form-control col-md-10" placeholder="Haber başlığını yazınız..." style="left:15px;" value="{{$haber->baslik ?? ''}}" max="200" min="3">
					<div class="form-check"  style="left:50px;">
						@if(isset($haber->durum))
						<input name="haber_durum" class="form-check-input" type="checkbox" value="{{$haber->durum}}"
						@if($haber->durum) checked @endif >
						
						@else
						<input name="haber_durum" class="form-check-input" type="checkbox">
						@endif
						<label class="form-check-label">Aktiflik Durumu</label>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="col-lg-4">
				<input type="file" class="form-control" name="image" value="{{$haber->resim ?? ''}}">
				<br>
				@if(isset($haber->resim))
				<img src="{{$haber->resim}}" width="300">
				@endif
			</div>
			<br>
			<div class="col-lg-10">
				<textarea id="summernote" name="haber_metni" value="{{$haber->icerik ?? ''}}">
				@if(isset($haber->icerik))
				{{$haber->icerik}}
				@else
				Bu <em>alana</em> <u>içeriği</u> <strong>yazınız...</strong>
				@endif
				</textarea>
			</div>
			<br>
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
								<input name="haber_tarih" type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" value="{{$haber->yayinTarihi ?? ''}}"/>
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
@endsection
@section('js')
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
$('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' },
format: 'YYYY-MM-DD hh:mm A'
});
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

</script>
@endsection
