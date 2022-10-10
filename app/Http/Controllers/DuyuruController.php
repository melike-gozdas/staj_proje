<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Duyuru;
use Illuminate\Support\Str;
use App\Http\Controllers\DateTime;
use Illuminate\Support\Facades\Redirect;
use DB;

class DuyuruController extends Controller
{
    public function duyuru_ekle()
    {
        return view('admin.duyuru.duyuru_duzen');
    }
    
    public function duyuru_kaydet(Request $request)
    {
        if($request->id == "yeni")
        {
            $duyuru = new Duyuru();
        }

        else
        {
            $duyuru=Duyuru::find($request->id);
        }
        $duyuru->baslik=$request->duyuru_baslik;
        $duyuru->icerik=$request->duyuru_metni;
        $duyuru->durum=isset($request->duyuru_durum);
        $duyuru_tarih=$request->duyuru_tarih;
        $duyuru_tarih=explode(" - ", $duyuru_tarih);
        $duyuru_tarih[0]=strtotime($duyuru_tarih[0]);
        $duyuru_tarih[1]=strtotime($duyuru_tarih[1]);
        $duyuru->baslamaTarihi=date("Y-m-d H:i:s", $duyuru_tarih[0]);
        $duyuru->bitisTarihi=date("Y-m-d H:i:s", $duyuru_tarih[1]);
        $duyuru->save();

        if($request->hasFile('image'))
        {
            $imageName=Str::slug($duyuru->baslik).".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/img'),$imageName);
            $duyuru->resim='/assets/img/'.$imageName;
        }
        $duyuru->url = '/' .  $duyuru->id . '/' . Str::slug($duyuru->baslik);
        $duyuru->save();

        #return view('admin.duyuru.duyuru_duzen',$duyuru);
        return redirect('/duyurular');
        
    }

    /*
        $duyuru_baslik=$request->duyuru_baslik;
        $duyuru_durum=$request->duyuru_durum;
        $duyuru_metni=$request->duyuru_metni;
        $duyuru_resim=$request->duyuru_resim;
        $duyuru_tarih=$request->duyuru_tarih;
        $duyuru_tarih=explode(" - ", $duyuru_tarih);
        $duyuru_tarih[0]=strtotime($duyuru_tarih[0]);
        $duyuru_tarih[1]=strtotime($duyuru_tarih[1]);

        if(isset($request->duyuru_durum))
        {
            $duyuru_durum=true;
        }
        else
        {
            $duyuru_durum=false;
        }

        $duyuru = Duyuru::create([
            "baslamaTarihi"=>date("Y-m-d H:i:s", $duyuru_tarih[0]),
            "bitisTarihi"=>date("Y-m-d H:i:s", $duyuru_tarih[1]),
            "duyuruResim"=>$duyuru_resim,
            "duyuruBaslik"=>$duyuru_baslik,
            "duyuruYazisi"=>$duyuru_metni,
            "aktiflikDurumu"=>$duyuru_durum,
            "duyuruUrl"=>NULL,
        ]);
        $duyuru->duyuruUrl = '/' .  $duyuru->id . '/' . Str::slug($duyuru->duyuru_baslik);
        $duyuru->save();
        */


    public function duyuru_duzen()
    {
        return view('admin.duyuru.duyuru_duzen');
        
    }
    
    public function duyuru_duzenle($id)
    {
        $data = [];
        $data['duyuru'] = Duyuru::find($id);
        if (is_null($data['duyuru'])) {
            return redirect('https://google.com');
            # code...
        }
        return view('admin.duyuru.duyuru_duzen',$data);
    }


    public function duyuru_listele()
    {
        $data = [];
        $duyurular = Duyuru::get();
        $data['duyurular']=$duyurular;
        return view('admin.duyuru.duyuru_listele',$data);
        
    }
    public function duyuru_sil($id)
    {
        Duyuru::find($id)->delete();
        return redirect('/duyurular');
    }



}
