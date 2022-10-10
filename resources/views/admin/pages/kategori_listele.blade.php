@extends('admin.layouts.master')
@section('title', 'Kategori Listesi')
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
<!-- SweetAlert2 -->
<link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
@endsection
@section('PageAdı')
Haber Listele
@endsection
@section('content')
<div class="row-md-12">
  <div class="col-md-12">
    <div class="card card-outline card-info">
      <div class="card-header">
   
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
                      <th name="h_id" style="text-align: center;">Id</th>
                      <th name="h_baslik" style="text-align: center;">Kategori Başlığı</th>
                      <th name="h_islem" style="text-align: center;">İşlemler</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($kategoriler as $kategori)
                    <tr>
                      <th scope="row" style="text-align: center;">{{$kategori->id}}</th>
                      <td style="text-align: center;">{{$kategori->adi}}</td>
                      <td style="text-align: center;">
                        <a href="/kategori-guncelle/{{$kategori->id}}" title="Güncelle" class="btn btn-sm btn-primary"><i class='fa fa-pen'></i></a>
                        <!--
                        <a href='#' title="Sil" class="btn btn-sm btn-danger"><i class='fa fa-times'></i></a>
                      -->

                        <button title="Sil" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger-{{$loop->iteration}}"><i class='fa fa-trash'></i></button>
                        <div class="modal fade" id="modal-danger-{{$loop->iteration}}" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content bg-danger">
                              <div class="modal-header">
                                <h4 class="modal-title">Kategori Silinecek</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Silmek istediğinize emin misiniz?</p>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Vazgeç</button>
                                <a href="/kategori-sil/{{$kategori->id}}" type="button" class="btn btn-outline-light">Sil</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
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

@endsection
@section('js')
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
@endsection