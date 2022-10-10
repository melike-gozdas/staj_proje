@extends('admin.layouts.master')
@section('title', 'Grup Listesi')
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
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/assets/dist/css/adminlte.min.css">

@endsection
@section('PageAdı')
Grup Listele
@endsection
@section('content')

<div class="row-md-12">
  <div class="col-md-12">
    <div class="card card-outline card-info">
      <div class="card-header">
        <!-- kategori ekleme butonu -->
        
        <div class="col-12">
          <a href="/kategori-ekle" class="btn btn-success float-right">Kategori Ekle</a>
        </div>
      </div>
      <!-- /.card-header -->
      
      <div class="card-body">
        <div class="row">
          
          <div class="col-12">
          <section class="content">
          <div class="row">
            
              <div class="col-12" id="accordion">

                @foreach ($kategoriler as $kategori)
                  <div class="card card-primary card-outline">
                   
                      <a class="d-block w-100" data-toggle="collapse" href="#collapseOne-{{$kategori->id}}">
                          <div class="card-header">
                              <h4 class="card-title w-100">
                                  {{$kategori->adi}}
                                  <a href="/kategoriler/{{$kategori->id}}/alt-baslik-ekle" title="Proje Oluştur" type="submit" name="projeEkle" class="btn btn-success" style="margin-left:1450px;">
                                   <i class="fa fa-plus"></i>
                                  </a>
                              
                              </h4>
                          </div>
                      </a>
                      
                      <div id="collapseOne-{{$kategori->id}}" class="collapse" data-parent="#accordion">
                          <div class="card-body">
                            @foreach ($kategori->sayfalar as $sayfa)
                             {{$sayfa->sayfaBaslik}}
                             <br>
                             @endforeach
                          
                             <!-- DENEME -->
                            


                             <!-- DENEME -->
                             
                             
                          </div>
         
                      </div>
                      
                  </div>
                @endforeach
          </div>
        </div>
        </section>
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
<script src="admin/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="admin/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src=".admin/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/assets/dist/js/demo.js"></script>

@endsection