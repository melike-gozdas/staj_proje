<?php

namespace Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginForm extends Auth
{
    public function girisekrani()
    {
      return view('form');
    }

    public function adminpaneli()
    {
      dd('denemess');
      return view('welcome');
    }
}
