<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Haber;
use App\Models\Duyuru;
use App\Models\Slider;
use App\Models\Iletisim_bilgileri;
use Illuminate\Support\Str;
use App\Http\Controllers\DateTime;
use Illuminate\Support\Facades\Redirect;
use DB;

class TemaController extends Controller
{
    public function anasayfa()
    {
    	$data = [];
    	$sliders = Slider::where('durum',1)->get();
        $data['sliders']=$sliders;
        $iletisim = Iletisim_bilgileri::get();
        $data['iletisim']=$iletisim;
        $haberler = Haber::paginate(4);
        $data['haberler']=$haberler;


        return view('tema.anasayfa',$data);
        
    }
    /*
    public function iletisim_goster()
    {
        $data = [];
        $iletisim = Iletisim_bilgileri::get();
        $data['iletisim']=$iletisim;
        return view('tema.footer',$data);
        
    }*/

    public function haber_listele()
    {
        $data = [];
        $haberler = Haber::get();
        $data['haberler']=$haberler;
        return view('tema.haber_listele',$data);
        
    }

}
