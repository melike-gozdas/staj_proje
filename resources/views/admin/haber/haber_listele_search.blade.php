@extends('admin.layouts.master')
@section('title', 'Haber Listesi')
@section('css')
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
<script src="/assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/admin/dist/js/demo.js"></script>
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
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/plugins/jszip/jszip.min.js"></script>
<script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>
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