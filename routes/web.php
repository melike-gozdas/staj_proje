<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master;
use App\Http\Controllers\Proje;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\ProjeVeritabaniController;
use App\Http\Controllers\DenemeController;
use App\Http\Controllers\HaberController;
use App\Http\Controllers\DuyuruController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\LoginForm;
use App\Http\Controllers\AdminController;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\IcerikController;
use App\Http\Controllers\SayfaOlusturController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

Route::get('/anasayfa_1',[Master::class,'openPage']);

//Route::post('/Proje/Ekle',[ProjeVeritabaniController::class,'Ekleme'])

Route::get('/proje',[Proje::class,'openPage']);

Route::get('/kullanici-olustur', function(){
  $user = new App\Models\User();
  $user->password = Hash::make('123');
  $user->email = 'kadriye@example.com';
  $user->name = 'kadriyeg';
  $user->save();
  dd($user);
});



Route::get("/login", [LoginController::class, 'authenticate']);

Route::get('/contact-form', [CaptchaServiceController::class, 'index']);
Route::post('/captcha-validation', [CaptchaServiceController::class, 'capthcaFormValidate']);
Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);

Route::get('/haber-ekle', [HaberController::class, 'haber_ekle']);
Route::post('/haber-kaydet', [HaberController::class, 'haber_kaydet'])->name('haber_kaydet');
Route::get('/haberler', [HaberController::class, 'haber_listele']);
Route::get('/haber-duzenle/{id}',[HaberController::class,'haber_duzenle'])->name('haber_duzenle');
Route::get('/haber-sil/{id}',[HaberController::class,'haber_sil'])->name('haber_sil');

#Route::post('/haberduzen',[DenemeController::class,'haber_ekle'])->name('haber_ekle');

Route::get('/duyuru-ekle', [DuyuruController::class, 'duyuru_ekle']);
Route::post('/duyuru-kaydet', [DuyuruController::class, 'duyuru_kaydet'])->name('duyuru_kaydet');
Route::get('/duyurular', [DuyuruController::class, 'duyuru_listele']);
Route::get('/duyuru-sil/{id}',[DuyuruController::class,'duyuru_sil'])->name('duyuru_sil');
Route::get('/duyuru-duzenle/{id}',[DuyuruController::class,'duyuru_duzenle'])->name('duyuru_duzenle');

Route::post('/proje-kaydet', [ProjeVeritabaniController::class, 'ProjeKaydet'])->name('ProjeKaydet');

Route::get('/proje-ekle', [ProjeVeritabaniController::class, 'ProjeEkle']);

Route::get('/projeler', [ProjeVeritabaniController::class, 'proje_listele']);

Route::get('/proje-düzenle/{id}', [ProjeVeritabaniController::class, 'projeDüzenle'])->name('ProjeDüzenle');

Route::get('/proje-sil/{id}', [ProjeVeritabaniController::class, 'projeSil'])->name('ProjeSil');

Route::get('/iletisim-bilgisi-ekle', [ProjeVeritabaniController::class, 'iletisimbilgileriekle'])->name('IletisimBilgisiEkle');

Route::post('/iletisim-bilgisi-kaydet', [ProjeVeritabaniController::class, 'iletisimbilgilerikaydet'])->name('IletisimBilgisiKaydet');


/*

Route::get('/haber', function () {

    return view('haber_duzen');
});*/
Route::get('/loginpage', [LoginForm::class, 'girisekrani']);
Route::post('/admin', [LoginForm::class, 'adminpaneli'])->name('adminpage');
Route::post('/captcha-validation', [CaptchaServiceController::class, 'capthcaFormValidate']);
Route::post('/giris-kontrol' , [LoginController::class, 'authenticate']);
Route::get('/adminpaneli', [AdminController::class,'index'])->middleware('kontrol.islemleri');
Route::get('/sayfa-ekle', [SayfaOlusturController::class,'sayfaEkle']);
Route::post('/sayfa-kaydet', [SayfaOlusturController::class, 'sayfaKaydet'])->name('sayfa-kaydet');
Route::get('/sayfa-goruntule', [SayfaOlusturController::class, 'sayfaGoruntule']);

Route::get('/kategoriler', [SayfaOlusturController::class, 'kategoriler']);
Route::get('/kategori-ekle', [SayfaOlusturController::class, 'kategori_ekle']);
Route::get('/kategori-guncelle/{id}', [SayfaOlusturController::class, 'kategori_guncelle']);
Route::get('/kategori-sil/{id}', [SayfaOlusturController::class, 'kategori_sil']);
Route::post('/kategori-kaydet', [SayfaOlusturController::class, 'kategori_kaydet']);

Route::get('/kategoriler/{id}/alt-baslik-ekle', [SayfaOlusturController::class, 'alt_baslik_ekle']);
Route::post('/alt-baslik-kaydet', [SayfaOlusturController::class, 'alt_baslik_kaydet'])->name('alt-baslik-kaydet');








Route::get('/slider-ekle', [SliderController::class, 'slider_ekle']);
Route::post('/slider-kaydet', [SliderController::class, 'slider_kaydet'])->name('slider_kaydet');
Route::get('/sliderlar', [SliderController::class, 'slider_listele']);
Route::get('/slider-sil/{id}',[SliderController::class,'slider_sil'])->name('slider_sil');
Route::get('/slider-duzenle/{id}',[SliderController::class,'slider_duzenle'])->name('slider_duzenle');
//Route::get('/slider-gecis', [DenemeController::class, 'slider']);

Route::get('/haberler_2', [HaberController::class, 'haber_listeleme_2']);

Route::get('/anasayfa', [TemaController::class, 'anasayfa']);
Route::get('/haberler_3',[TemaController::class, 'haber_listele']);
Route::get('/tema_slider', [TemaController::class, 'slider_listele']);

