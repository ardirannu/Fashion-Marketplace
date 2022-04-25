<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Pesananberhasil;
use App\Models\Pesanandetail;
use App\Models\Toko;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class PesananberhasilController extends Controller
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
        $pesanan_berhasil = Pesananberhasil::get();
        return view('admin.pesanan.pesanan_berhasil', ['pesanan_berhasil' => $pesanan_berhasil]);
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

     // id dibawah adalah pesanan_id
     public function invoice($id)
     {
         $tanggal = Carbon::now()->toFormattedDateString();
         $pesanan = Pesanan::find($id);
         $pesanan_detail = Pesanandetail::where('pesanan_id', $id)->get();
         $toko = Toko::first();
         $pesanan_berhasil = Pesananberhasil::where('pesanan_id', $id)->first();
 
         $pdf = PDF::loadView('admin.pesanan.invoice', ['tanggal'=>$tanggal, 'pesanan'=>$pesanan, 'pesanan_detail'=>$pesanan_detail, 'toko'=>$toko, 'pesanan_berhasil'=>$pesanan_berhasil]);
         return $pdf->stream();
     }
     
}
