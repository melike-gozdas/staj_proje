@extends('tema.listeleme')
@section('title', 'Haber Listesi')
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

<!-- DataTables -->
<link rel="stylesheet" href="/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/assets/admin/dist/css/adminlte.min.css">
@endsection
@section('PageAdı')
Haber Listele
@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      
      <!-- /.card -->
      <div class="card card-outline card-info">
        <div class="card-header">
          <a href="/haber-ekle" title="Haber Oluştur" type="submit" name="haber_olustur" class="btn btn-success" style="margin-left: 1360px;">
              <i >Haber Oluştur</i>
              </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="sorting" style="text-align: center;">Id</th>
                <th style="text-align: center;">Haber Başlığı</th>
                <th style="text-align: center;">Güncellenme Tarihi</th>
                <th style="text-align: center;">Aktiflik Durumu</th>
                <th style="text-align: center;">İşlemler</th>
              </tr>
            </thead>
            <tbody>
              @foreach($haberler as $haber)
              <tr>
                <th scope="row" style="text-align: center;">{{$haber->id}}</th>
                <td style="text-align: center;">{{$haber->baslik}}</td>
                <td style="text-align: center;">{{$haber->updated_at}}</td>
                <td style="text-align: center;">{!!$haber->durum ==0 ? "<span class='text-danger'>Pasif </span>" : "<span class='text-success'>Aktif </span>" !!}</td>
                <td style="text-align: center;">
                  <a href="{{route('haber_duzenle',$haber->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class='fa fa-pen'></i></a>
                  <!--
                  <a href='#' title="Sil" class="btn btn-sm btn-danger"><i class='fa fa-times'></i></a>
                  -->
                  <button title="Sil" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger-{{$loop->iteration}}"><i class='fa fa-trash'></i></button>
                  <div class="modal fade" id="modal-danger-{{$loop->iteration}}" style="display: none;" aria-hidden="true">
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
                          <a href="{{route('haber_sil',$haber->id)}}" type="button" class="btn btn-outline-light">Sil</a>
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
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
@endsection
@section('js')
<script src="/assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="/assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
$(function () {
$("#example1").DataTable({
"responsive": true, "lengthChange": false, "autoWidth": false,
"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
});
</script>
@endsection