<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proje;
use App\Models\ProjeDosya;
use App\Models\ProjeKategori;
use App\Models\ProjeResim;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Iletisim_bilgileri;


class ProjeVeritabaniController extends Controller
{

    public function ProjeEkle(){
        return view('admin.proje.Projedit');
    }


    public function proje_listele()
    {
        $data = [];
        $projeler = Proje::get();
        $data['projeler']=$projeler;
        return view('admin.proje.proje_listele',$data);
    }

    public function ProjeKaydet(Request $request)
    {

        if($request->id=="yeni")
        {
            $proje = new Proje();
            $kategori = new ProjeKategori();
        }

        else
        {
            $proje=Proje::find($request->id);
            $kategori=ProjeKategori::find($request->id);
        }

        $tarih=$request->tarih;
        $tarih =explode(" - ",$tarih);
        $tarih[0]=strtotime($tarih[0]);
        $tarih[1]=strtotime($tarih[1]);

        $proje->pAdi = $request->pAdi;
        $proje->pBaslamaTarihi = date("Y-m-d H:i:s", $tarih[0]);
        $proje->pBitisTarihi = date("Y-m-d H:i:s", $tarih[1]);
        $proje->pYazisi = $request->pYazisi;
        //$proje->pResim = $request->pResim;
        $proje->pKategoriAdi=isset($request->pKategoriAdi);

        if($request->hasFile('pResim')){
            $resimAdi=Str::slug($proje->pAdi).'.'.$request->pResim->getClientOriginalExtension();
            $request->pResim->move(public_path('assets/img'),$resimAdi);
            $proje->pResim='/assets/img/'.$resimAdi;
        }

         if($request->hasFile('pDosya')){
            $dosyaAdi=Str::slug($proje->pAdi).'.'.$request->pDosya->getClientOriginalExtension();
            $request->pDosya->move(public_path('assets/doc'),$dosyaAdi);
            $proje->pDosya='/assets/doc/'.$dosyaAdi;
        }

        $kategori->pAciklama = $request->pAciklama;
        $kategori->save();

        $proje->pKategoriId=$kategori->id;   
        $proje->save();

        //dd($request->post());

        return redirect('/projeler');

    }

    public function projeDüzenle($id) {
        $data = [];
        $data['proje'] = Proje::find($id);
        if(is_null($data['proje'])) {
            return redirect('https://google.com');
        }
        return view('admin.proje.Projedit',$data);
    }

    public function projeSil($id) {
        Proje::find($id)->delete();
        return redirect('/projeler');
    }

    public function iletisimbilgileriekle()
    {
        return view('admin.proje.iletisim_bilgileri');
    }

    public function iletisimbilgilerikaydet(Request $request)
    {
        $iletisim_bilgileri  = new Iletisim_bilgileri();
        $iletisim_bilgileri->adi = $request->adi;
        $iletisim_bilgileri->soyAdi = $request->soyAdi;
        $iletisim_bilgileri->email = $request->emails;
        $iletisim_bilgileri->adres = $request->adres;
        $iletisim_bilgileri->save();
        return redirect('https://www.google.com');
    }
}
