@extends('admin.layouts.master')


@section('title', 'Proje')

@section('css')

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/assets/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/admin/assets/plugins/summernote/summernote-bs4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="/admin/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="/admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/admin/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="/admin/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="/admin/assets/plugins/bs-stepper/css/bs-stepper.min.css">

  <link rel="stylesheet" href="/admin/assets/dist/css/adminlte.min.css?v=3.2.0">

  <!-- dropzonejs -->
  <link rel="stylesheet" href="/admin/assets/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/assets/dist/css/adminlte.min.css">


@endsection

@section('PageAdı', 'Proje Ekleme')

@section('content')

<form action="{{ route('ProjeKaydet') }}" method="post" enctype="multipart/form-data">
  @csrf

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <a href="/projeler" class="btn btn-secondary">İptal</a>
          <input type="submit" value="Değişiklikleri Kaydet" class="btn btn-success float-right">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Yeni Proje</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                                
                @if(empty($proje->id))
                  <input type="text" hidden name="id" value="yeni">
                @else 
                  <input type="text" hidden name="id" value="{{$proje->id ?? 'yeni'}}">
                @endif

                <label for="inputName">Proje İsmi</label>
                <input type="text" name="pAdi" id="inputName" class="form-control" placeholder="Projenin Adı..." value="{{$proje->pAdi ?? ''}}" >
              </div>

              <div class="form-group">
                  <label for="inputProjectLeader">Proje Aktiflik Durumu</label>
                    <div class="form-check"  style="left:50px;">
                      @if(isset($proje))
                        <input name="pKategoriAdi" class="form-check-input" type="checkbox" value="1"
                      @if($proje->pKategoriAdi == 1) checked @endif >
                      @else
                        <input name="pKategoriAdi" class="form-check-input" type="checkbox">
                      @endif
                 <label class="form-check-label">Aktif</label>
              </div>
              </div>

              <div class="form-group">
                <label for="inputProjectLeader">Proje Durum Açıklaması</label>

                <input type="text" name="pAciklama" id="inputProjectLeader" class="form-control" placeholder="Kategori açıklaması girin..." value="{{$proje->pAciklama ?? ''}}" >
              
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>


        <div class="col-md-6">

          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Proje Zamanlayıcı</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Proje Zaman Aralığı</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" name="tarih" class="form-control float-right" id="reservationtime" value=

                    <?php
                      if ( isset($proje)) {

                        $proje->pBaslamaTarihi=strtotime($proje->pBaslamaTarihi);
                        $proje->pBitisTarihi=strtotime($proje->pBitisTarihi);

                        $proje->pBaslamaTarihi=date("m/d/Y H:i:s", $proje->pBaslamaTarihi);
                        $proje->pBitisTarihi=date("m/d/Y H:i:s", $proje->pBitisTarihi);

                        $tarih=[$proje->pBaslamaTarihi , $proje->pBitisTarihi];
                        $tarih=implode(" - ",$tarih);
                        
                      }   
                     ?>

                    "{{$tarih ?? '' }}">

                  </div>
                </div>
              </div>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Projeye Dosya Ekle</h3>
              </div>
              <div class="card-body">

                <div class="row">

                <div class="col-md-6">

                <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->

                    <div class="custom-file">
                      <input type="file" name="pResim" class="custom-file-input" id="customFile" value="
                      {{$proje->pResim ?? ''}}" >

                      <label class="custom-file-label" for="customFile">Fotoğraf Seç...</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  @if (isset($proje->pResim))
                  <img src={{$proje->pResim}} width="40px" height="40px">
                  @endif
                </div>
            </div>
                  
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->

                    <div class="custom-file">
                      <input type="file" name="pDosya" class="custom-file-input" id="customFile2" value="{{$proje->pDosya ?? ''}}" >
                      <label class="custom-file-label" for="customFile">Dosya Seç...</label>
                    </div>
                    <br>
                  @if (isset($proje->pDosya))
                  <embed src={{$proje->pDosya}} width="500px" height="50px">
                  @endif

                  </div>
              </div>
            </div>

      
        </div>
      </div>


      <div class="row">

        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Summernote
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <textarea id="summernote" name="pYazisi" value="{{$proje->pYazisi ?? ''}}" >{{$proje->pYazisi ?? ''}}
               
              </textarea>
            </div>
          </div>
        </div>

      </div>

        
    </div>
</form>

@endsection

@section('js')

<script src="/admin/assets/plugins/jquery/jquery.min.js"></script>
<script src="/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin/assets/plugins/select2/js/select2.full.min.js"></script>
<script src="/admin/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="/admin/assets/plugins/moment/moment.min.js"></script>
<script src="/admin/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="/admin/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="/admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/admin/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="/admin/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="/admin/assets/plugins/dropzone/min/dropzone.min.js"></script>
<script src="/admin/assets/dist/js/adminlte.min.js?v=3.2.0"></script>
<script src="/admin/assets/dist/js/demo.js"></script>
<script src="/admin/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="/admin/assets/plugins/toastr/toastr.min.js"></script>
<script src="/admin/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="/admin/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/admin/assets/dist/js/adminlte.min.js"></script>
<script src="/admin/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


<script>
$(function () {
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
  format: 'MM/DD/YYYY hh:mm:ss'
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
</script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

@endsection
