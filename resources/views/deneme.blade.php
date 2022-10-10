<!--HABER TARİH-->
<div class="card card-default">
    <div class="card-header">
		<h5>Haber Tarihi</h5>
	</div>
	<div class="card-body">
	    <div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Tarih ve Zaman Seçimini Yapınız</h3>
			</div>
			<div class="card-body">
				<div class="form-group">
                    <label>Date and time range:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservationtime">
                    </div>
                    <!-- /.input group -->
                </div>
            </div>
		</div>
	</div>
    <!-- /.card-body -->
</div>



<!--HABER KAYDET SİL-->
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
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Sil
        </button>
		<div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
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
						<button type="button" class="btn btn-outline-light">Sil</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
	</div>
</div>

<!--HABER BAŞLIK AKTİFLİK DURUMU-->
<div class="card-header">
	<div class="form-group">
		<div class="row">
			<input type="text" name="haber_baslik" class="form-control col-md-10" placeholder="Haber başlığını yazınız..." style="left:15px;">
			<div class="form-check"  style="left:50px;">
				<input name="haber_durum" class="form-check-input" type="checkbox">
				<label class="form-check-label">Aktiflik Durumu</label>
			</div>
		</div>
	</div>
</div>
<!-- /.card-header -->



<!--HABER DOSYA YÜKLEME-->
<div class="row">
	<div class="col-md-8">
		<div class="col-md-12">
			<div class="card card-default">
				<div class="card-header">
					<h5>Yüklemek istediğiniz dosyayı seçiniz...</h5>
				</div>  
				<div class="card-body">
				    <div id="actions" class="row">
						<div class="col-lg-8">
							<div class="btn-group w-100">
								<span name="h_dosya_ekle" class="btn btn-success col fileinput-button dz-clickable">
								<i class="fas fa-plus"></i>
								<span>Dosya Ekle</span>
								</span>
								<button name="h_dosya_yukle" type="submit" class="btn btn-primary col start">
								<i class="fas fa-upload"></i>
								<span>Yüklemeye Başla</span>
							    </button>
							</div>
						</div>
						<div class="col-lg-6 d-flex align-items-center">
							<div class="fileupload-process w-100">
								<div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="opacity: 0;">
									<div class="progress-bar progress-bar-success" style="width: 100%;" data-dz-uploadprogress="">
									</div>
								</div>
							</div>
						</div>
					</div>
			    </div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
        </div>
	</div>
</div>
