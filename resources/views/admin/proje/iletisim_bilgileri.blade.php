@extends('admin.layouts.master')

@section('title', 'İletişim Bilgileri')

@section('css')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="admin/assets/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="admin/assets/dist/css/adminlte.min.css">

@endsection

@section('PageAdı', 'İletişim Bilgileri')

@section('content')

<form action="/iletisim-bilgisi-kaydet" method="post">
  @csrf

    <div class="container-fluid">
      <div class="col-7">
      <div class="card">
        <div class="card-body row">

          <div class="col-7">

            <div class="form-group">
              <label for="inputName">Ad</label>
              <input type="text" name="adi" id="inputName" class="form-control" placeholder="Adınızı giriniz..." />
            </div>

            <div class="form-group">
              <label for="inputSubject">Soyad</label>
              <input type="text" name="soyAdi" id="inputSubject" class="form-control" placeholder="Soyadınızı giriniz..." />
            </div>

            <div class="form-group">
              <label for="inputEmail">E-Mail</label>
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email adresinizi giriniz..." />
            </div>

            <div class="form-group">
              <label for="inputEmail">Adres</label>
              <input type="text" name="adres" id="inputAdres" class="form-control" placeholder="Adresinizi giriniz..." />
            </div>
            

            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="KAYDET">
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</form>

@endsection


@section('js')

<script src="admin/aadmin/assets/plugins/jquery/jquery.min.js"></script>

<script src="admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="admin/assets/dist/js/adminlte.min.js"></script>

<script src="admin/assets/dist/js/demo.js"></script>

@endsection
