<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*class LoginController extends Controller
{
  
* Handle an authentication attempt.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response

public function authenticate(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::check()) {
        // Authentication passed...
        return redirect()->intended('giris-kontrol');
    }
}
}
*/

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('adminpaneli');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email' , 'password');
    }
}