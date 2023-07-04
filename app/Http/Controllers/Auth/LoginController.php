<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function login()
    {
        return view('auth.login');
    }
    public function loginRequest(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        try {
            $login = Auth::attempt($request->only('email', 'password'));
            if ($login) {
                return redirect()->route('admin.dashboard');
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }

    function logout()
    {
        Auth::guard('web')->logout();

        return redirect('/login');
    }
}
