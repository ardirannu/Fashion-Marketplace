<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Produk;
use Carbon\Carbon;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProdukController extends Controller
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
        $produk = Produk::get();
        return view('admin.produk.index', ['produk' => $produk]);
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
            'nama' => 'required|unique:produk',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
            'gambar_produk' => 'mimes:jpeg,jpg,png,gif|required|max:1000', 
            'gambar_produk_2' => 'mimes:jpeg,jpg,png,gif|required|max:1000', 
            'gambar_produk_3' => 'mimes:jpeg,jpg,png,gif|required|max:1000', 
            'gambar_produk_4' => 'mimes:jpeg,jpg,png,gif|required|max:1000', 
        ],

        [
            'nama.required' => 'Silahkan isi Nama Produk !',
            'nama.unique' => 'Data sudah ada !',
            'kategori.required' => 'Silahkan Pilih Kategori !',
            'deskripsi.required' => 'Silahkan isi Deskripsi Produk !',
            'ukuran.required' => 'Silahkan Pilih Ukuran !',
            'harga.required' => 'Silahkan isi Harga Produk !',
            'gambar_produk.required' => 'Silahkan Pilih Gambar Produk !',
            'gambar_produk_2.required' => 'Silahkan Pilih Gambar Produk !',
            'gambar_produk_3.required' => 'Silahkan Pilih Gambar Produk !',
            'gambar_produk_4.required' => 'Silahkan Pilih Gambar Produk !',
        ]);
    }

    private function _validation_update(Request $request){
        // validasi inputan dari form
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'gambar_produk' => 'mimes:jpeg,jpg,png,gif|max:1000', 
            'gambar_produk_2' => 'mimes:jpeg,jpg,png,gif|max:1000', 
            'gambar_produk_3' => 'mimes:jpeg,jpg,png,gif|max:1000', 
            'gambar_produk_4' => 'mimes:jpeg,jpg,png,gif|max:1000', 
        ],

        [
            'nama.required' => 'Silahkan isi Nama Produk !',
            'deskripsi.required' => 'Silahkan isi Deskripsi Produk !',
            'harga.required' => 'Silahkan isi Harga Produk !',
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

        $current_date_time = Carbon::now()->toDateTimeString();
        $kode = Str::random($length = 6);
        $kode_unik = strtoupper ($kode );

        // image upload
        $gambar_produk_1   = $request->file('gambar_produk');
        $gambar_produk_2   = $request->file('gambar_produk_2');
        $gambar_produk_3   = $request->file('gambar_produk_3');
        $gambar_produk_4   = $request->file('gambar_produk_4');
        $nama_gambar_produk_1   = $gambar_produk_1->getClientOriginalName();
        $nama_gambar_produk_2   = $gambar_produk_2->getClientOriginalName();
        $nama_gambar_produk_3   = $gambar_produk_3->getClientOriginalName();
        $nama_gambar_produk_4   = $gambar_produk_4->getClientOriginalName();
        $request->file('gambar_produk')->move('image_produk', $nama_gambar_produk_1);
        $request->file('gambar_produk_2')->move('image_produk', $nama_gambar_produk_2);
        $request->file('gambar_produk_3')->move('image_produk', $nama_gambar_produk_3);
        $request->file('gambar_produk_4')->move('image_produk', $nama_gambar_produk_4);

        $produk = new Produk;
        $produk->kode_produk = $kode_unik;
        $produk->nama = $request->nama;
        $produk->handtag = $request->handtag;
        $produk->kategori = $request->kategori;
        $produk->ukuran = $request->ukuran;
        $produk->warna = $request->warna;
        $produk->bahan = $request->bahan;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->gambar_produk = $nama_gambar_produk_1;
        $produk->gambar_produk_2 = $nama_gambar_produk_2;
        $produk->gambar_produk_3 = $nama_gambar_produk_3;
        $produk->gambar_produk_4 = $nama_gambar_produk_4;
        $produk->slug = SlugService::createSlug(Produk::class, 'slug', $request->nama);
        $produk->created_at = $current_date_time;
        $produk->updated_at = $current_date_time;
        
        $produk->save();

        return redirect()->route('produk.index')->with('input_success','Berhasil Menambah Data !');
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
        $produk = Produk::find($id);
        return view('admin.produk.edit', ['produk' => $produk]);
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

        $current_date_time = Carbon::now()->toDateTimeString();

        $gambar = Produk::find($id);

        if ($request->file('gambar_produk') != ''){
            $gambar_produk_1   = $request->file('gambar_produk');
            $nama_gambar_produk_1   = $gambar_produk_1->getClientOriginalName();
            $request->file('gambar_produk')->move('image_produk', $nama_gambar_produk_1);
            unlink(public_path('image_produk/'.$gambar->gambar_produk));
        }elseif ($request->file('gambar_produk') == ''){
            $nama_gambar_produk_1 = $gambar->gambar_produk;
        }
        if ($request->file('gambar_produk_2') != ''){
            $gambar_produk_2   = $request->file('gambar_produk_2');
            $nama_gambar_produk_2   = $gambar_produk_2->getClientOriginalName();
            $request->file('gambar_produk_2')->move('image_produk', $nama_gambar_produk_2);
            unlink(public_path('image_produk/'.$gambar->gambar_produk_2));
        }elseif ($request->file('gambar_produk_2') == ''){
            $nama_gambar_produk_2 = $gambar->gambar_produk_2;
        }
        if ($request->file('gambar_produk_3') != ''){
            $gambar_produk_3   = $request->file('gambar_produk_3');
            $nama_gambar_produk_3   = $gambar_produk_3->getClientOriginalName();
            $request->file('gambar_produk_3')->move('image_produk', $nama_gambar_produk_3);
            unlink(public_path('image_produk/'.$gambar->gambar_produk_3));
        }elseif ($request->file('gambar_produk_3') == ''){
            $nama_gambar_produk_3 = $gambar->gambar_produk_3;
        }
        if ($request->file('gambar_produk_4') != ''){
            $gambar_produk_4   = $request->file('gambar_produk_4');
            $nama_gambar_produk_4   = $gambar_produk_4->getClientOriginalName();
            $request->file('gambar_produk_4')->move('image_produk', $nama_gambar_produk_4);
            unlink(public_path('image_produk/'.$gambar->gambar_produk_4));
        }elseif ($request->file('gambar_produk_4') == ''){
            $nama_gambar_produk_4 = $gambar->gambar_produk_4;
        }

        $produk = Produk::find($id);
        $produk->nama = $request->nama;
        $produk->handtag = $request->handtag;
        $produk->ukuran = $request->ukuran;
        $produk->warna = $request->warna;
        $produk->bahan = $request->bahan;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->gambar_produk = $nama_gambar_produk_1;
        $produk->gambar_produk_2 = $nama_gambar_produk_2;
        $produk->gambar_produk_3 = $nama_gambar_produk_3;
        $produk->gambar_produk_4 = $nama_gambar_produk_4;
        $produk->slug = SlugService::createSlug(Produk::class, 'slug', $request->nama);
        $produk->updated_at = $current_date_time;
        
        $produk->save();
        return redirect()->route('produk.index')->with('input_success','Berhasil Update Data !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = Produk::find($id);
        unlink(public_path('image_produk/'.$gambar->gambar_produk));
        unlink(public_path('image_produk/'.$gambar->gambar_produk_2));
        unlink(public_path('image_produk/'.$gambar->gambar_produk_3));
        unlink(public_path('image_produk/'.$gambar->gambar_produk_4));
        Produk::destroy($id);
        return redirect()->route('produk.index');
    }

    public function image_view($id)
    {
        $produk = Produk::find($id);
        return view('admin.produk.modal-image', ['produk' => $produk]);
    }
    
}
