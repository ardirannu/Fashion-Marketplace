<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $role = Role::get();
        $user = Admin::get(); //send data nomor to nomor.index for input form
        return view('admin.user.index', ['user' => $user, 'role' => $role,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    private function _validation(Request $request){
        // validasi inputan dari form
        $validated = $request->validate([
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:7|regex:/[A-Z]/|regex:/[0-9]/',
        ],

        [ 
            'role_id.required' => 'Form ini harus diisi !',
            'name.required' => 'Form ini harus diisi !',
            'email.required' => 'Form ini harus diisi !',
            'email.email' => 'Format email salah !',
            'email.unique' => 'Email sudah terdaftar !',
            'password.required' => 'Form ini harus diisi !',
            'password.min' => 'Minimal 7 karakter !',
            'password.regex' => 'Format password salah ! | Masukkan minimal satu huruf besar dan satu digit angka !',
        ]);
    }

    private function _validation_update(Request $request){
        // validasi inputan dari form
        $validated = $request->validate([
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
        ],

        [
            'role_id.required' => 'Form ini harus diisi !',
            'name.required' => 'Form ini harus diisi !',
            'email.required' => 'Form ini harus diisi !',
            'email.email' => 'Format email salah !',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validation($request);
    
        Admin::create(['role_id' => $request->role_id, 'name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password),]);  
        
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::get();
        $user = Admin::find($id);
        return view('admin.user.user-edit', ['user' => $user, 'role' => $role,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->_validation_update($request);
        
        Admin::where('id', $id)->update(['role_id' => $request->role_id, 'name' => $request->name, 'email' => $request->email, ]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);
        return redirect()->route('user.index');
    }
}
