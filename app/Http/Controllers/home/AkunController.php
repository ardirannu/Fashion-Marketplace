<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Alamatuser;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');  
    } 
    
    public function index()
    {
        //mengambil id user yg sedang login
        $id_user = auth()->guard('web')->user()->id;
        $pesanan = Pesanan::where('user_id', $id_user)->get(); 
        $user_alamat = Alamatuser::where('user_id', $id_user)->get(); 
        return view('home.akun', ['pesanan' => $pesanan, 'user_alamat' => $user_alamat]);   
    }

    private function _validation_konfirmasi(Request $request){
        // validasi inputan dari form
        $validated = $request->validate([
            'resi_pembayaran' => 'mimes:jpeg,jpg,png,gif|required|max:5000', 
        ],

        [
            'resi_pembayaran.required' => 'Silahkan masukkan bukti pembayaran !',
        ]);
    }

    private function _validation_alamat(Request $request){
        // validasi inputan dari form
        $validated = $request->validate([
            'nama_jalan' => 'required', 
            'kota' => 'required', 
            'provinsi' => 'required', 
            'kode_pos' => 'required', 
        ],

        [
            'nama_jalan.required' => 'Masukkan Nama Jalan !',
            'kota.required' => 'Masukkan Kota !',
            'provinsi.required' => 'Masukkan Provinsi !',
            'kode_pos.required' => 'Masukkan Kode Pos !',
        ]);
    }

    public function konfirmasi(Request $request)
    {
        $this->_validation_konfirmasi($request);
        // image upload
        $gambar_resi   = $request->file('resi_pembayaran');
        $nama_resi   = $gambar_resi->getClientOriginalName();
        $request->file('resi_pembayaran')->move('resi_pembayaran', $nama_resi);

        Pesanan::where('kode_pesanan', $request->kode_pesanan)->update(array('resi_pembayaran' => $nama_resi));

        return redirect()->route('home.index')->with('konfirmasi_berhasil','Konfirmasi Pesanan '.$request->kode_pesanan.' berhasil dilakukan, tim Rainbow segera melakukan verifikasi pada bukti pembayaran anda. Anda dapat melihat status pesanan pada menu Akun. Terimakasih Telah Belanja di Rainbow.com');

    }

    public function ubah_alamat(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        $this->_validation_alamat($request);

        $user_id = auth()->guard('web')->user()->id;

        Alamatuser::where('user_id', $user_id)->update(array('nama_jalan' => $request->nama_jalan, 'kota' => $request->kota, 'provinsi' => $request->provinsi, 'kode_pos' => $request->kode_pos));

        return redirect()->route('home.akun')->with('ubah_alamat','Berhasil Ubah Alamat !');
    }

    public function tambah_alamat(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        $this->_validation_alamat($request);

        $user_id = auth()->guard('web')->user()->id;

        $alamat_user = new Alamatuser;
        $alamat_user->user_id = $user_id;
        $alamat_user->nama_jalan = $request->nama_jalan;
        $alamat_user->kota = $request->kota;
        $alamat_user->provinsi = $request->provinsi;
        $alamat_user->kode_pos = $request->kode_pos;
        $alamat_user->created_at = $current_date_time;
        $alamat_user->updated_at = $current_date_time;
        $alamat_user->save();

        return redirect()->route('home.akun')->with('tambah_alamat','Berhasil Tambah Alamat !');
    }

}
