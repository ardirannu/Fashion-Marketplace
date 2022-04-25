@extends('home.layouts.master')

@section('title')
    Rainbow | Marketplace
@endsection

@section('content')
<!-- Tampilan Web -->
<section class="spad">
    <div class="d-sm-none d-none d-md-block">
        <div class="container">
            <table class="table table-bordered cobain">
                <tbody>
                    <tr>
                        <td class="rrr">
                            <i class="fa fa-info-circle info"></i>
                            <div class="butuhBantuan">
                                <span class="font-weight-bolder">Butuh Bantuan? Hubungi Customer Sevice Kami</span>
                                <p>Jam Kerja, Senin - Jumat (9.00 - 18.00) <br>
                                    Sabtu - Minggu (8.00 -17.00)
                                </p>
                            </div>
                        </td>
                        <td class="bbb">
                            <i class="fa fa-envelope pesan"></i>
                            <div class="emailKami">
                                <span class="font-weight-bolder">Email Kami</span>
                                <p>cs@rainbow.com</p>
                            </div>
                        </td>
                        <td>
                            <i class="fa fa-comments info"></i>
                            <div class="emailKami ">
                                <span class="font-weight-bolder">SMS Kami</span>
                                <p>0812 8880 4414</p>
                            </div>
                        </td>
                    </tr>  
                </tbody> 
            </table>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="row mt-3">
                        <i class="fa fa-book  mt-1 ml-3 mr-2" style="font-size: 22px;"></i>
                        <h4 class="text-dark">Buku Alamat</h4>
                    </div>
                    <hr>
                    <p class="font-weight-normal text-body" style="font-size:19px; letter-spacing:1px;">Alamat
                        Pengiriman</p>
                    <div class="widgetDataPengiriman">
                        <p>{{Auth::user()->name}}</p>
                        @foreach ($user_alamat as $no => $data)
                        <p>{{$data->nama_jalan}}</p>
                        <p>{{$data->kota}} - {{$data->provinsi}} - {{$data->kode_pos}}</p>
                        @endforeach
                        <p>Nomor Handphone: {{Auth::user()->no_hp}}</p>
                        @if ($user_alamat->isEmpty())
                            <a href="{{ route('home.akun')}}" class="btn btn-outline btn-sm masukDaftar">Tambah Alamat</a>                            
                        @else
                            <a href="{{ route('home.akun')}}" class="btn btn-outline btn-sm masukDaftar">Ubah Alamat</a>    
                        @endif
                    </div>
                    <hr>
                </div>
                <div class="col-md-6"> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="proceed-checkout">
                                <ul>
                                    <li>
                                        @foreach ($keranjang as $no => $data)
                                        <div class="widgetProduk mt-4 mb-4">
                                            <img src="{{asset('image_produk/'.$data->produk->gambar_produk)}}" class="gambarDetail" />
                                            <ul class="detailProduk detailProdukMobile">
                                                <li>{{ $data->produk->nama }}</li>
                                                <li>Warna : {{ $data->warna }}
                                                </li>
                                                <li>Ukuran : {{ $data->ukuran }}
                                                </li>
                                                <li>
                                                    Jumlah : {{ $data->jumlah }} <span>Harga : IDR {{ number_format($data->produk->harga , 0, ',', '.') }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        @endforeach 
                                    </li>
                                    <li class="subtotal mt-3">Total Pembayaran <span>IDR {{ number_format($total_bayar, 0, ',', '.') }}</span></li>
                                    <li class="subtotal mt-3">Metode Pembayaran <span>Bank Mandiri (Transfer)</span></li>
                                    <li class="subtotal mt-3">No. Rekening <span>2208 1996 1403</span></li>
                                </ul>

                                <form action="{{ route('home.checkout')}}" method="POST">
                                    @csrf
                                    <input type="text" name="user_alamat_id" value="{{$user[0]->alamat_user[0]->id}}" hidden>
                                    <input type="text" name="total_pembayaran" value="{{$total_bayar}}" hidden>

                                @if ($user_alamat->isEmpty())
                                <button type="submit" class="btn btn-secondary btn-block btn-lg keranjangButton"
                                style="border-radius: 0px 0px 0px 0px;" disabled>BAYAR SEKARANG</button>
                                <p>Lengkapi alamat pengiriman untuk melanjutkan pemesanan !</p>
                                @else
                                <button type="submit" class="btn btn-secondary btn-block btn-lg keranjangButton"
                                style="border-radius: 0px 0px 0px 0px;">BAYAR SEKARANG</button>
                                <p>*Biaya pengiriman bersifat bayar bayar ditempat.</p>
                                @endif
                                </form>
                               
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>

    </div>
</section>
<!-- End -->

<!-- sesi Mobile -->
<div class="d-md-none d-sm-block">
    <div class="text-center cobba">
        <h4>Checkout</h4>
    </div>
    <div class="container">
        <hr>
        <h5>Alamat Pengiriman</h5>
        <div class="alert alert-danger mt-2" role="alert" style="border-radius: 0px 0px 0px 0px;">
            <div class="dataPengirimanMobile">
                @if ($user_alamat->isEmpty())
                    <p>Lengkapi alamat pengiriman untuk melanjutkan pemesanan !</p> 
                    <a href="{{ route('home.akun')}}" class="btnDataPengiriman">Tambah Alamat</a>                            
                @else
                    <p class="font-weight-bolder">{{Auth::user()->name}}</p>
                    @foreach ($user_alamat as $no => $data)
                        <p>{{$data->nama_jalan}}</p>
                        <p>{{$data->kota}} - {{$data->provinsi}} - {{$data->kode_pos}}</p>
                    @endforeach      
                    <p>Nomor Handphone: {{Auth::user()->no_hp}}</p>
                    <a href="{{ route('home.akun')}}" class="btnDataPengiriman">Ubah Alamat</a>    
                @endif
            </div>
        </div>
        <div class="container">
            <p class="font-weight-bolder">Pembayaran Anda</p>
            <div class="widgetTransaksiMobile mt-4">
                <div class="row">
                    <div class="col mr-5">Total Bayar</div>
                    <div class="col ml-3"><b>IDR {{ number_format($total_bayar, 0, ',', '.') }}</b></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col mr-5">Metode Bayar</div>
                    <div class="col ml-3"><b>Bank Mandiri</b></div>
                </div>
                <hr>
                 <div class="row">
                    <div class="col mr-5">Bank Transfer</div>
                    <div class="col ml-3"><b>Mandiri</b></div>
                </div>
                <hr>
                 <div class="row">
                    <div class="col mr-5">No. Rekening</div>
                    <div class="col ml-3"><b>2208 1996 1403</b></div>
                </div>
                <hr>
            </div>
            <form action="{{ route('home.checkout')}}" method="POST">
                @csrf
                <input type="text" name="user_alamat_id" value="{{$user[0]->alamat_user[0]->id}}" hidden>
                <input type="text" name="total_pembayaran" value="{{$total_bayar}}" hidden>
            @if ($user_alamat->isEmpty())
                <p>Lengkapi alamat pengiriman untuk melanjutkan pemesanan !</p>
            @else
                <p>*Biaya pengiriman bersifat bayar bayar ditempat.</p>
                <button type="submit" class="btn-prosesMobile btn-block text-uppercase">Proses Pembayaran</button>              
            @endif
            </form>
            <a href="{{ url()->previous() }}" class="btn-prosesMobile btn-block mb-5 text-uppercase untukOutline">Kembali</a>
        </div>
    </div>
</div>
<!-- End Mobile -->
<!-- Modal -->
<!-- Button trigger modal -->

<!-- Shopping Cart Section End -->
@endsection
