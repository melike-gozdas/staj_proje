<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginForm extends Controller
{
    public function girisekrani()
    {
      return view('form');
    }

    public function adminpaneli()
    {
      return view('master');
    }
}
