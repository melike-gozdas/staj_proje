<?php

namespace App\Http\Controllers;
use App\Models\Sayfa;
use App\Models\Grup;
use App\Models\Alt_baslik;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Supports\Facades\Redirect;


class SayfaOlusturController extends Controller
{
    public function kategoriler()
    {
        $data=[];
        $kategoriler = Grup::get();
        $data['kategoriler']=$kategoriler;
        return view('admin.pages.alt_baslik_listele', $data);
    }

    public function kategori_ekle()
    {
        return view('admin.pages.kategori_form');
    } 

    public function kategori_guncelle($id)
    {
        $kategori = Grup::find($id);
        return view('admin.pages.kategori_form',['kategori' => $kategori]);
    }

    public function kategori_sil($id)
    {
        $kategori = Grup::find($id);
        $kategori->delete();
        return redirect("/kategoriler");
    }

    public function kategori_kaydet(Request $request)
    {
        if($request->id == 'yeni'){
            $kategori = new Grup();
        }
        else{
            $kategori = Grup::find($request->id);
        }

        $kategori->adi = $request->adi;
        $kategori->save();
        return redirect("/kategoriler");
    }
       
  //ALT BAŞLIK FONKSİYONLARI


  public function alt_baslik_ekle($id)
    {
        $data['kategori'] = Grup::find($id);
        return view('admin.pages.alt_baslik_ekle',$data);
    } 

  public function alt_baslik_kaydet(Request $request)
  {
    //dd($request);
    $kontrol = Sayfa::where('sayfaBaslik', $request->sayfaBaslik)->exists();
    if ($kontrol) {
        return "hata zaten var";
    } else {
        $sayfa = new Sayfa();
         $sayfa->sayfaBaslik = $request->sayfaBaslik;
         $sayfa->Grup_id =$request->kategori_id;
         $sayfa->sayfaIcerik=$request->sayfaIcerik;
        // dd($sayfa->sayfaBaslik);
        $sayfa->save();
        return redirect("/kategoriler");
    }
    dd($kontrol);
        // if($request->id == 'yeni'){
        //     $kategori = new Sayfa();
        // }
        // else{
        //     $kategori = Sayfa::find($request->id);
        // }

        $sayfa->sayfaBaslik = $request->sayfaBaslik;
        dd($sayfa->sayfaBaslik);
        $sayfa->save();
        return redirect("/gruplar");
  } 
  public function alt_basliklar_liste()
  {
      $data=[];
      $sayfalar = Grup::get();
      $data['kategoriler']=$sayfalar;
      return view('admin.pages.alt_baslik_listele', $data);
  }

}