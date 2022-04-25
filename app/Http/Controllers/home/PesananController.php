<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Alamatuser;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\Pesanandetail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PesananController extends Controller
{
    public function __construct()
    { 
        $this->middleware('auth'); 
    }

    public function index()
    {
        //mengambil id user yg sedang login
        $id_user = auth()->guard('web')->user()->id;
        // ambil data dari tabel keranjang
        $keranjang = Keranjang::where('user_id', $id_user)->get();
        $total_bayar = Keranjang::where('user_id', $id_user)->sum('total_harga');
        $user = User::where('id', $id_user)->get();
        $user_alamat = Alamatuser::where('user_id', $id_user)->get(); 

        if ($keranjang->isEmpty()) {
            return redirect()->route('home.keranjang');
        } else {
            return view('home.checkout',  ['keranjang' => $keranjang, 'total_bayar' => $total_bayar, 'user' => $user, 'user_alamat' => $user_alamat ]);  
        }
        
    }

    public function checkout(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        $year = Carbon::createFromFormat('Y-m-d H:i:s', $current_date_time)->year;
        $month = Carbon::now()->format('m');
        $day = Carbon::now()->format('i');
        $kode = Str::random($length = 8);
        $kode_pesanan = strtoupper ('#'.$kode.$day.$month.$year);
       
        $user_id = Auth::user()->id;
        $user_alamat_id = $request->user_alamat_id;
        $total_pembayaran = $request->total_pembayaran;

        $pesanan = new Pesanan;
        $pesanan->kode_pesanan = $kode_pesanan;
        $pesanan->user_id = $user_id;
        $pesanan->user_alamat_id = $user_alamat_id;
        $pesanan->total_pembayaran = $total_pembayaran;
        $pesanan->created_at = $current_date_time;
        $pesanan->updated_at = $current_date_time;
        $pesanan->save();

        $data_keranjang = Keranjang::where('user_id', $user_id)->get();
        for ($i = 0; $i < count($data_keranjang); $i++) {
            $pesanan_detail[] = [
                'produk_id' => $data_keranjang[$i]->produk_id,
                'pesanan_id' => $pesanan->id,
                'warna' => $data_keranjang[$i]->warna, 
                'ukuran' =>  $data_keranjang[$i]->ukuran,
                'jumlah' =>  $data_keranjang[$i]->jumlah,
            ];
        }
        Pesanandetail::insert($pesanan_detail); 
        Keranjang::where('user_id', $user_id)->delete();
        return redirect()->route('home.pesanan_berhasil')->with(['total_pembayaran' => $total_pembayaran, 'kode_pesanan' => $kode_pesanan]);
    }

    public function konfirmasi(Request $request)
    {
        // image upload
        $gambar_resi   = $request->file('resi_pembayaran');
        $nama_resi   = $gambar_resi->getClientOriginalName();
        $request->file('resi_pembayaran')->move('resi_pembayaran', $nama_resi);

        Pesanan::where('kode_pesanan', $request->kode_pesanan)->update(array('resi_pembayaran' => $nama_resi));
        return redirect()->route('home.index')->with('konfirmasi_berhasil','Konfirmasi Pesanan '.$request->kode_pesanan.' berhasil dilakukan, tim Rainbow segera melakukan verifikasi pada bukti pembayaran anda. Anda dapat melihat status pesanan pada menu Akun. Terimakasih Telah Belanja di Rainbow.com');
    }

}
