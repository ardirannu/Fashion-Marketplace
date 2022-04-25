<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class DetailController extends Controller
{
    public function index($handtag, $id)
    {
        $produk = Produk::find($id); 
        $ukuran[] = Produk::where('id', $id)->get('ukuran');

        $produk_terbaru = Produk::orderBy('id', 'desc')->paginate(4);
        return view('home.detail', ['produk' => $produk, 'produk_terbaru' => $produk_terbaru, 'ukuran' => $ukuran]);
    }
} 
