<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Pesananberhasil;
use App\Models\Pesanandetail;
use Illuminate\Support\Str;

class PesananController extends Controller
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
        $pesanan = Pesanan::get();
        return view('admin.pesanan.index', ['pesanan' => $pesanan]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function resi_view($id)
    {
        $pesanan = Pesanan::find($id);
        return view('admin.pesanan.modal-resi', ['pesanan' => $pesanan]);
    }

    public function update_status($id)
    {
        Pesanan::where('id', $id)->update(['status' => 'Pesanan Berhasil']);

        // mengupdate status sama halnya melakukan post ke tabel pesanan berhasil dengan parameter id pesanan
        // submit data ke tabel pesanan berhasil
        $pesanan_berhasil = new Pesananberhasil;
        $kode = Str::random($length = 8);
        $kode_invoice = strtoupper ($kode );
        $pesanan_berhasil->kode_invoice = '#'.$kode_invoice;
        $pesanan_berhasil->pesanan_id = $id;
        $pesanan_berhasil->save();

        return redirect()->route('pesanan.index');
    }
    
}
