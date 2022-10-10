<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Master extends Controller
{
    public function openPage()
    {
      return view('admin.panels.anasayfa');
    }
}
