<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth'); 
    } 

    public function index()
    {
        //mengambil id user yg sedang login
        $id_user = auth()->guard('web')->user()->id;
        $keranjang = Keranjang::where('user_id', $id_user)->get();
        $total_bayar = Keranjang::where('user_id', $id_user)->sum('total_harga');
        return view('home.keranjang', ['keranjang' => $keranjang, 'total_bayar' => $total_bayar ]);  
    } 

    private function _validation(Request $request){
        // validasi inputan dari form
        $validated = $request->validate([
            'warna' => 'required',
            'ukuran' => 'required',
            'jumlah' => 'required|integer|min:1',
        ],

        [
            'warna.required' => 'Silahkan pilih warna produk !',
            'ukuran.required' => 'Silahkan pilih ukuran produk !',
            'jumlah.required' => 'Silahkan masukkan jumlah produk !',
        ]);
    }

    public function tambah(Request $request){
        $this->_validation($request);
        $current_date_time = Carbon::now()->toDateTimeString();

        $produk_id = $request->produk_id;
        $warna = $request->warna;
        $ukuran = $request->ukuran;
        $keranjang_check = Keranjang::where('produk_id', $produk_id)->get();
        //jika produk dan spesifikasi telah ada dalam keranjang maka hanya dilakukan update pada jumlahnya saja
        if ($keranjang_check->isEmpty()) {
            $keranjang = new Keranjang;
            $keranjang->user_id = Auth::user()->id;
            $keranjang->produk_id = $request->produk_id;
            $keranjang->warna = $request->warna;
            $keranjang->ukuran = $request->ukuran;
            $keranjang->jumlah = $request->jumlah;
            $keranjang->total_harga = $request->harga_produk * $request->jumlah;
            $keranjang->created_at = $current_date_time;
            $keranjang->updated_at = $current_date_time;
            $keranjang->save();
        } elseif (!$keranjang_check->isEmpty()) {
            if (($keranjang_check[0]->produk_id == $produk_id) and ($keranjang_check[0]->warna == $warna) and ($keranjang_check[0]->ukuran == $ukuran)){
                $jumlah = $keranjang_check[0]->jumlah;
                $jumlah_update = $jumlah + $request->jumlah;
                $total_harga = $keranjang_check[0]->total_harga;
                $total_harga_tambahan = $request->jumlah * $request->harga_produk;
                $total_harga_update = $total_harga + $total_harga_tambahan;
                $keranjang = Keranjang::where('produk_id', $produk_id)->where('warna', $warna)->where('ukuran', $ukuran)->update(array('jumlah' => $jumlah_update, 'total_harga' => $total_harga_update));
            }else{
                $keranjang = new Keranjang;
                $keranjang->user_id = Auth::user()->id;
                $keranjang->produk_id = $request->produk_id;
                $keranjang->warna = $request->warna;
                $keranjang->ukuran = $request->ukuran;
                $keranjang->jumlah = $request->jumlah;
                $keranjang->total_harga = $request->harga_produk * $request->jumlah;
                $keranjang->created_at = $current_date_time;
                $keranjang->updated_at = $current_date_time;
                $keranjang->save();
            }
        }

        return redirect()->back()->with('success_tambah_keranjang', 'Produk telah masuk ke keranjang, Silahkan menuju ke keranjang untuk menyelesaikan pesanan anda.');
    }

    public function hapus($id)
    {
        Keranjang::destroy($id);
        return redirect()->route('home.keranjang');
    }
    
}
