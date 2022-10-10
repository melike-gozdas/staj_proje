<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Proje extends Controller
{
    public function openPage()
    {
      return view('admin.proje.Projedit');
    }
}
