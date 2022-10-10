<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;
use App\Http\Controllers\DateTime;
use Illuminate\Support\Facades\Redirect;
use DB;


class SliderController extends Controller
{
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
}
