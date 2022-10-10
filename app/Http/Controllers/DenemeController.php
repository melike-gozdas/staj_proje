<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Haber;
use App\Models\Duyuru;
use App\Models\Slider;
use Illuminate\Support\Str;
use App\Http\Controllers\DateTime;
use Illuminate\Support\Facades\Redirect;
use DB;



class DenemeController extends Controller
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



    public function slider_ekle()
    {
        return view('admin.slider.slider_duzen');
    }

    public function slider_kaydet(Request $request)
    {
        if($request->id=="yeni")
        {
            $slider = new Slider();
        }

        else
        {
            $slider=Slider::find($request->id);

        }
        
        $slider->baslik=$request->baslik;
        /*
        $slider_tarih=$request->tarih;
        $slider_tarih = strtotime($slider_tarih);
        $slider->yayinTarihi=date("Y-m-d H:i:s", $haber_tarih);
        */
        $slider->durum=isset($request->durum);
        $slider->save();
        if($request->hasFile('image'))
        {
            $imageName=Str::slug($slider->baslik).".".$slider->id.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/img'),$imageName);
            $slider->resim='/assets/img/'.$imageName;
        }
        $slider->url = '/' .  $slider->id . '/' . Str::slug($slider->baslik);
        $slider->save();
        
        return redirect('/sliderlar');
        #return view('admin.haber.haber_ekle',$haber);

    }

    public function slider_duzenle($id)
    {
        $data = [];
        $data['slider'] = Slider::find($id);
        if (is_null($data['slider'])) {
            return redirect('https://google.com');
            # code...
        }
        return view('admin.slider.slider_duzen',$data);
    }

    public function slider_listele()
    {
        $data = [];
        $sliders = Slider::get();
        $data['sliders']=$sliders;
        return view('admin.slider.slider_listele',$data);
        
    }


    public function slider_sil($id)
    {
        Slider::find($id)->delete();
        return redirect('/sliderlar');
    }

    public function slider()
    {
        $data = [];
        $sliders = Slider::get();
        $data['sliders']=$sliders;
        return view('admin.slider.slider',$data);
        
    }

    public function haber_cagir()
    {
        return view('haber_duzen');
        
    }
    public function haber_listeleme()
    {
        $data = [];
        $haberler = Haber::get();
        $data['haberler']=$haberler;
        return view('haber_listeleme_search',$data);
        
    }
     
    public function haber_listeleme_2()
    {
        $data = [];
        $haberler = Haber::get();
        $data['haberler']=$haberler;
        return view('haber_listeleme_search',$data);
        
    }


    public function deneme()
    {
        return view('admin.deneme');
        
    }


}
