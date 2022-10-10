<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Haber;
use Illuminate\Support\Str;
use App\Http\Controllers\DateTime;
use Illuminate\Support\Facades\Redirect;
use DB;

class HaberController extends Controller
{
    public function haber_ekle()
    {
        return view('admin.haber.haber_duzen');
        
    }

    public function haber_duzenle($id)
    {

        $data = [];
        $data['haber'] = Haber::find($id);
        if (is_null($data['haber'])) {
            return redirect('https://google.com');
            # code...
        }
        return view('admin.haber.haber_duzen',$data);
        
    }

    public function haber_kaydet(Request $request)
    {
        if($request->id=="yeni")
        {
            $haber = new Haber();
        }

        else
        {
            $haber=Haber::find($request->id);

        }
        
        $haber->baslik=$request->haber_baslik;
        $haber->icerik=$request->haber_metni;
        $haber_tarih=$request->haber_tarih;
        $haber_tarih = strtotime($haber_tarih);
        $haber->yayinTarihi=date("Y-m-d H:i:s", $haber_tarih);
        $haber->durum=isset($request->haber_durum);
        
        #$haber->haberResim=$request->image;
        $haber->save();
        if($request->hasFile('image'))
        {
            $imageName=Str::slug($haber->baslik).".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/img'),$imageName);
            $haber->resim='/assets/img/'.$imageName;
        }
        $haber->url = '/' .  $haber->id . '/' . Str::slug($haber->baslik);
        $haber->save();
        
        return redirect('/haberler_2');
        #return view('admin.haber.haber_ekle',$haber);

    }
    
    /*
    public function haber_kaydet(Request $request)
    {
        if(isset($request->haber_durum))
        {
            $haber_durum=true;
        }
        else
        {
            $haber_durum=false;
        }
        $haber = Haber::create([
            "baslik"=>$haber_baslik,
            "manset"=>$manset,
            "haberYazisi"=>$haber_metni,
            "yayinTarihi"=>date("Y-m-d H:i:s", $haber_tarih),
            "aktiflikDurumu"=>$haber_durum,
            "haberResim"=>$haber_resim,
            "url"=>NULL,
        ]);
        
        $haber->url = '/' .  $haber->id . '/' . Str::slug($haber->baslik);
        $haber->save();
    }
    */
    
    public function haber_listele()
    {
        $data = [];
        $haberler = Haber::get();
        $data['haberler']=$haberler;
        return view('admin.haber.haber_listele',$data);
        
    }

    public function haber_sil($id)
    {
        Haber::find($id)->delete();
        return redirect('/haberler');
    }

    public function haber_listeleme_2()
    {
        $data = [];
        $haberler = Haber::get();
        $data['haberler']=$haberler;
        return view('haber_listeleme_search',$data);
        
    }

}
