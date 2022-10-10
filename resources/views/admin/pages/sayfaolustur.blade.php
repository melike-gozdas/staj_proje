@extends('admin.layouts.master')
@section('title', 'Menü Duzenleme')
@section('css')
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="path/to/select2.min.css" rel="stylesheet" />

<!-- SweetAlert2 -->
<link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
@endsection
@section('PageAdı')
Menü Düzenleme
@endsection
@section('content')
<form action="{{url('kategoriler')}}" method="post">
	@csrf
	<div class="card card-outline card-info">
		<div class="card-header">
			<div class="form-group">
				<label>Kategori Adını Giriniz</label>
				@if(empty($sayfa->id))
				<input type="text" hidden name="id" value="yeni">
				
				@else
				<input type="text" hidden name="id" value="$sayfa->id">
				
				@endif 
				<!--
				<input type="text" hidden name="id" value="yeni">
			-->
				<div class="row">
					<input type="text" name="sayfaBaslik" class="form-control col-md-10" placeholder="Menü adını giriniz" style="left:15px;" value="{{$sayfa->sayfaBaslik ?? ''}}">
				</div>

				<div class="form-group">
				  @if(empty($sayfagrup->id))
				<input type="text" hidden name="id" value="yeni">
				
				@else
				<input type="text" hidden name="id" value="$sayfagrup->id">
				
				@endif
                </div>
			</div>
		</div>
		
			</div>
			<div class="row">
				<div class="col-">
					&nbsp;
					<div class="row">
			<div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Kaydet"></input>
            </div>
			</div>
					
					
				</div>
			</div>
			<!-- /.card-body -->
			
		</div>
		
	</div>
	
</form>
@endsection
@section('js')
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="path/to/select2.min.js"></script>
</script>
@endsection