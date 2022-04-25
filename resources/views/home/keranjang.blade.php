@extends('home.layouts.master')

@section('title')
    Rainbow | Marketplace
@endsection

@section('content')
     <!-- Shopping Cart Section Begin -->
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

                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-bell"></i>
                    <span class="ml-1">Untuk melakukan checkout minimal silahkan belanja minimal IDR 500.000</span>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th width="80px">No</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($keranjang as $no => $data)
                            <tr>
                                <th scope="col">{{ $no+1 }}</th>
                                <td>
                                    <a href="{{ route('home.produk.detail', [$data->produk->handtag, $data->produk->id, $data->produk->slug])}}">
                                        <img src="{{asset('image_produk/'.$data->produk->gambar_produk)}}" class="gambarDetail" />
                                    </a>
                                    <ul class="detailProduk">
                                        <li class="font-weight-bold">
                                            {{ $data->produk->nama }}
                                        </li>
                                        <li>Kode Produk :
                                            <span>{{ $data->produk->kode_produk }}</span>
                                        </li>
                                        <li>Color : 
                                            <span>{{ $data->warna }}</span>
                                        </li>
                                        <li>Size :
                                            <span>{{ $data->ukuran }}</span>
                                        </li>
                                    </ul>
                                </td> 
                                <td>IDR {{ number_format($data->produk->harga, 0, ',', '.') }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>IDR <span >{{ number_format($data->produk->harga * $data->jumlah, 0, ',', '.') }}</span></td>
                                <td>
                                    <a href="#" data-id="{{ $data->id }}" class="btn btn-danger hapus-keranjang">
                                        <form action="{{ route('home.keranjang.hapus', $data->id )}}" id="hapus{{ $data->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form> 
                                    Hapus
                                    </a>
                                </td> 
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="alert alert-secondary" role="alert">
                    <div class="totalHarga">
                        <span>
                            <h4 class="font-weight-bolder ">Total Bayar :<label for="" class="ml-5">IDR {{ number_format($total_bayar , 0, ',', '.') }}</label></h4>
                            <p class="">*Biaya pengiriman bersifat bayar bayar ditempat.</p>
                        </span>

                    </div>

                </div>
                <div class="alert alert-secondary" role="alert">
                    <div class="container">
                        <div class="row">
                            <div>
                                <button class="btn btn-outline btn-sm masukDaftar">
                                    <a class="nav-link masukDaftar" href="#">Kembali Berbelanja</a>
                                </button>
                            </div>
                            <div class=" ml-auto">
                                <a href="{{ route('home.checkout')}}" class="btn btn-secondary btn-lg keranjangButton text-white ">Lanjutkan</a>
                            </div>
                        </div> 
                    </div>
                </div>


            </div>

        </div>
    </section>

    <!-- sesi Mobile -->
    <div class="d-md-none d-sm-block">
        <div class="row justify-content-center text-center">
            <div class="col">
                <h4 class="font-weight-bolder cobba">Tas Belanja Saya</h4>
                <a href="" class="kembaliMobile">Kembali Berbelanja</a>
            </div>
        </div>
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-bell" style="font-size: 12px;"></i>
                <span class="ml-1 infoMobile">Untuk melakukan checkout minimal silahkan belanja minimal IDR
                    500.000</span>
            </div>
            <hr>

            @foreach ($keranjang as $no => $data)
            <div class="widgetProduk mt-4 mb-4">
                <img src="{{asset('image_produk/'.$data->produk->gambar_produk)}}" class="gambarDetail" />
                <ul class="detailProduk detailProdukMobile">
                    <li class="font-weight-bold">{{ $data->produk->nama }}</li>
                    <li>Kode Produk :
                        <span>{{ $data->produk->kode_produk }}</span>
                    </li>
                    <li>Warna :
                        <span>{{ $data->warna }}</span>
                    </li>
                    <li>Ukuran :
                        <span>{{ $data->ukuran }}</span>
                    </li>
                    <li>Harga :
                        IDR {{ number_format($data->produk->harga, 0, ',', '.') }}
                    </li>
                    <li>
                        <span>Jumlah :</span>
                        {{ number_format($data->produk->harga * $data->jumlah, 0, ',', '.') }}
                    </li>
                    <li class="mt-1 text-right">
                        <button class="btn btn-outline-danger btn-sm ml-1">Hapus</button>
                    </li>
                </ul>
            </div>
            @endforeach 

            <div class="row">
                <div class="col">
                    <h5>Total</h5>
                </div>
                <div class="col ml-auto text-right">
                    <h5 class="ml-auto">IDR {{ number_format($total_bayar , 0, ',', '.') }}</h5>
                </div>
            </div>
            <p style="font-size: 12px;">*Biaya pengiriman bersifat bayar bayar ditempat.</p>
            <hr>
            <div class="row justify-content-center text-center">
                <div class="col">
                    <a href="{{ route('home.checkout')}}" type="submit" class="btn btn-secondary btn-lg keranjangButton text-white btn-block mb-5 ">Lanjutkan</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mobile -->
@endsection

@push('page-scripts')
    <script>
        // alert konfirmasi hapus data
        $(".hapus-keranjang").click(function(e){
            id = e.target.dataset.id;
            $(`#hapus${id}`).submit();
        });
    </script>
@endpush
