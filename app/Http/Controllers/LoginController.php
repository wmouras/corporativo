<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // $username = explode('@', $credentials['email']);
        // $ldap = new LdapController();
        // $auth = $ldap->auth($username[0], $credentials['password']);

        // dd(Auth::guard('web'));

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            // Auth::sanctum[] = 'verified';
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.',]);
    }
}
