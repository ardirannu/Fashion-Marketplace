<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        //put logout method in except array of guest:pelanggan so that only logged in pelanggan user can have access
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login'); 
    }

    public function login(Request $request)
    {
        //validate form data
        $this->validate($request,
            [
                'email' => 'required|string|email',
                'password' => 'required|string|min:8',
            ]
        );

            //Attempt to login as admin
            $attemp_login = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
            
            if ($attemp_login) {
                //if unsuccessful then redirect to intended route or pelanggan index
                return redirect()->intended(route('dashboard.index'));
                //jika email dan password salah
            } elseif (!$attemp_login){
                return redirect()->route('admin.login')->with('login_gagal', 'Login Gagal, Silahkan masukkan email dan password yang benar.');
            }

    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

}
