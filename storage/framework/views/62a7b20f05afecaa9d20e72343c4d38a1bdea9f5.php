<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Haber Düzenleme</title>
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
		
	</head>
	<body>
		<div class="row-md-12">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<div class="form-group">
							<div class="row">
								<input type="text" class="form-control col-md-10" placeholder="Haber başlığını yazınız..." style="left:10px;">
								<div class="form-check"  style="left:50px;">
									<input class="form-check-input" type="checkbox">
									<label class="form-check-label">Aktiflik Durumu</label>
								</div>
							</div>
						</div>
						<!--
						<h4>&nbsp;Haber</h4>
						-->
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="col-lg-12">
							<div class="col-lg-4">
								<input type="file" class="form-control">
							</div>
							<div class="col-lg-10">
								<textarea id="summernote" name="haber_metni">
								Bu <em>alana</em> <u>içeriği</u> <strong>yazınız...</strong>
								</textarea>
							</div>
							<div class="input-group col-md-4">
								<div class="custom-file">
									<input type="file" class="form-control" id="file">
									<label class="custom-file-label" for="exampleInputFile">Dosya Seç</label>
								</div>
							</div>
							<br>
							
							<!--
							<img id="photo" class="img-fluid" src="" style="left:50px; height:550px; width:550px;"alt="Fotoğraf" onclick="change();"><br><br>
							<input type="file" id="file" name="resim"><br><br>
							<div class="row">
																			<div class="col-md-2">
																			</div>
																		
							</div>-->
							<div class="card card-default">
								<div class="card-header">
									<h5>&nbsp;Haber Metni</h5>
								</div>
								<div class="card-body">
									<div class="col-lg-10">
										<textarea class="form-control" rows="3" placeholder="Bu alana içeriği yazınız..."></textarea>
									</div>
									
								</div>
							</div>
							<div class="col-md-4">
								<div class="card card-default">
									<div class="card-header">
										<h5>Yayınlanma Tarihi</h5>
									</div>
									<div class="card-body">
										<div class="card card-primary">
											<div class="card-header">
												<h3 class="card-title">Tarih Seçimini Yapınız</h3>
											</div>
											<div class="card-body">
												<!-- Date and time picker -->
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
									<!-- /.card-body -->
								</div>
								<!--
								<button type="button" class="btn btn-success" >
								Kaydet
								</button>
								<button type="button" class="btn btn-danger" >
								Sil
								</button>
								-->
							</div>
							<div class="col">
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
											</div>
										</div>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
										Sil
										</button>
										<div class="modal fade" id="modal-danger">
											<div class="modal-dialog">
												<div class="modal-content bg-danger">
													<div class="modal-header">
														<h4 class="modal-title">Haber Silinecek</h4>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<p>Değişiklikler kaydedilsin mi?</p>
													</div>
													<div class="modal-footer justify-content-between">
														<button type="button" class="btn btn-outline-light" data-dismiss="modal">Vazgeç</button>
														<button type="button" class="btn btn-outline-light">Sil</button>
													</div>
												</div>
											</div>
										</div>
										<!-- /.modal -->
									</div>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
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
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
$(function () {
//Date and time picker
$('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
$('#summernote').summernote()
})
</script>
</body>
</html><?php /**PATH /home/melike/kbb-satj/resources/views/haber_duzen.blade.php ENDPATH**/ ?>