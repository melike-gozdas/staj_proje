@extends('admin.layouts.master')
@section('title', 'Slider Listesi')
@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
<link rel="stylesheet" href="/assets/admin/css/adminlte.min.css">
@endsection
@section('PageAdı')
Slider Listele
@endsection
@section('content')
<div class="row-md-12">
  <div class="col-md-12">
    <div class="card card-outline card-info">
      <div class="card-header">
        <div class="form-group">
          <div class="row">
            <input type="text" class="form-control col-md-10" placeholder="Bulmak istediğiniz slider başlığını yazınız..." style="left:10px;">
            <div class="input-group-append">
              <button type="submit" name="h_search_button" class="btn btn-default" style="margin-right: 12px;">
              <i class="fas fa-search"></i>
              </button>
              <a href="/slider-ekle" title="Slider Oluştur" type="submit" class="btn btn-success" style="margin-left: 20px;">
              <i class="fa fa-plus"></i>
              </a>
              
            </div>
          </div>
        </div>
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
                      <th style="text-align: center;">Id</th>
                      <th style="text-align: center;">Slider Başlığı</th>
                      <th style="text-align: center;">Slider Resmi</th>
                      <th style="text-align: center;">Güncellenme Tarihi</th>
                      <th style="text-align: center;">Aktiflik Durumu</th>
                      <th style="text-align: center;">İşlemler</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($sliders as $slider)
                    <tr>
                      <th scope="row" style="text-align: center;">{{$slider->id}}</th>
                      <td style="text-align: center;">{{$slider->baslik}}</td>
                      <td style="text-align: center;"><img src="{{$slider->resim}}" width="50" height="45"></td>
                      <td style="text-align: center;">{{$slider->updated_at}}</td>
                      <td style="text-align: center;">{!!$slider->durum ==0 ? "<span class='text-danger'>Pasif </span>" : "<span class='text-success'>Aktif </span>" !!}</td>
                      <td style="text-align: center;">
                        <a href="{{route('slider_duzenle',$slider->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class='fa fa-pen'></i></a>
                        <!--
                        <a href='#' title="Sil" class="btn btn-sm btn-danger"><i class='fa fa-times'></i></a>
                      -->

                        <button title="Sil" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger-{{$loop->iteration}}"><i class='fa fa-trash'></i></button>
                        <div class="modal fade" id="modal-danger-{{$loop->iteration}}" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content bg-danger">
                              <div class="modal-header">
                                <h4 class="modal-title">Slider Silinecek</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Silmek istediğinize emin misiniz?</p>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Vazgeç</button>
                                <a href="{{route('slider_sil',$slider->id)}}" type="button" class="btn btn-outline-light">Sil</a>
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
@endsection