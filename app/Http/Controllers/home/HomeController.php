<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Instagram;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::get();
        $produk_terbaru = Produk::orderBy('id', 'desc')->paginate(10);
        $produk_terlaris = Produk::whereBetween('stok', [1, 999])->orderBy('jumlah_terjual', 'desc')->paginate(8);
        $instagram = Instagram::get();
        return view('home.index', ['banner' => $banner, 'produk_terbaru' => $produk_terbaru, 'produk_terlaris' => $produk_terlaris, 'instagram' => $instagram, ]);
    } 
}
