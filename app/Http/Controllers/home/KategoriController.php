<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function kaos()
    {
        $kategori = Produk::where('kategori', 'kaos')->paginate(12);
        $paramSearch = 'kaos';
        return view('home.kategori', ['kategori' => $kategori, 'paramSearch' => $paramSearch]);
    }

    public function kemeja()
    {
        $kategori = Produk::where('kategori', 'kemeja')->paginate(12);
        $paramSearch = 'kemeja';
        return view('home.kategori', ['kategori' => $kategori, 'paramSearch' => $paramSearch]);
    }

    public function hoodie()
    {
        $kategori = Produk::where('kategori', 'hoodie')->paginate(12);
        $paramSearch = 'hoodie';
        return view('home.kategori', ['kategori' => $kategori, 'paramSearch' => $paramSearch]);
    }

    public function sweater()
    {
        $kategori = Produk::where('kategori', 'sweater')->paginate(12);
        $paramSearch = 'sweater';
        return view('home.kategori', ['kategori' => $kategori, 'paramSearch' => $paramSearch]);
    }

    public function jaket()
    {
        $kategori = Produk::where('kategori', 'jaket')->paginate(12);
        $paramSearch = 'jaket';
        return view('home.kategori', ['kategori' => $kategori, 'paramSearch' => $paramSearch]);
    }

    public function celana()
    {
        $kategori = Produk::where('kategori', 'celana')->paginate(12);
        $paramSearch = 'jaket';
        return view('home.kategori', ['kategori' => $kategori, 'paramSearch' => $paramSearch]);
    }

    public function search(Request $request, $paramSearch)
    {
        $nama = $request->nama;
        $handtag = $request->handtag;
        $kisaran_harga = $request->kisaran_harga;

        $search = Produk::whereBetween('stok', [1, 999])->where('nama','like',"%".$nama."%")->where('kategori','like',"%".$paramSearch."%")->where('handtag','like',"%".$handtag."%");

        //search by kisaran harga
        if ($kisaran_harga == 1) {
            $hasil_pencarian = $search->whereBetween('harga', [0, 99000])->paginate(20);
        }elseif ($kisaran_harga == 2) {
            $hasil_pencarian = $search->whereBetween('harga', [100000, 300000])->paginate(20);
        }elseif ($kisaran_harga == 3) {
            $hasil_pencarian = $search->whereBetween('harga', [300000, 500000])->paginate(20);
        }elseif ($kisaran_harga == 4) {
            $hasil_pencarian = $search->whereBetween('harga', [500000, 1000000])->paginate(20);
        }else {
            $hasil_pencarian = $search->paginate(20);
        }

        return view('home.search',['search' => $hasil_pencarian, 'paramSearch' => $paramSearch]);
    }
    
}
