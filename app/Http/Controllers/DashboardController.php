<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\User;
use App\Models\Pesanan;
use App\models\Produk;
use App\Admin;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $produk = Produk::count();
        $pelanggan = User::count();
        $keranjang = Keranjang::count();
        $admin = Admin::count();
        $pesanan_berhasil = Pesanan::where('status', 'Pesanan Berhasil')->count();
        $pesanan_gagal = Pesanan::where('status', 'Pesanan Gagal')->count();
        $pesanan_berhasil_rupiah = Pesanan::where('status', 'Pesanan Berhasil')->sum('total_pembayaran');
        return view('admin.index', ['produk' => $produk, 'pelanggan' => $pelanggan, 'keranjang' => $keranjang, 'admin' => $admin, 'pesanan_berhasil' => $pesanan_berhasil, 'pesanan_gagal' => $pesanan_gagal, 'pesanan_berhasil_rupiah' => $pesanan_berhasil_rupiah ]);
    }
} 
