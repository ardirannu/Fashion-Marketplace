<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PesananberhasilController extends Controller
{
    public function __construct()
    { 
        $this->middleware('auth'); 
    }

    public function index()
    {   
        $total_pembayaran = Session::get('total_pembayaran');
        $kode_pesanan = Session::get('kode_pesanan');
        if ($total_pembayaran == null and $kode_pesanan == null) {
            return redirect()->route('home.keranjang');
        } else {
            return view('home.pesanan_berhasil',  ['total_pembayaran' => $total_pembayaran, 'kode_pesanan' => $kode_pesanan]);
        }
        
    }

}
