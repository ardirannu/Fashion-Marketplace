@extends('home.layouts.master')

@section('title')
    Rainbow | Marketplace 
@endsection 

@section('content')
    <div class="row">
        <div class="col-lg-12">
            {{-- jika user belum melakukan verfikasi email maka akan muncul alert verifikasi email --}}
            @if (Auth::check() && !Auth::user()->email_verified_at)
                <div class="alert-md alert-success alert-dismissible show fade" role="alert">
                    <div class="container">
                        <div class="col-12">
                        <p class="d-inline">Untuk mulai berbelanja, Silahkan verfikasi email terlebih dahulu</p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="text-danger btn btn-link p-0 m-0 align-baseline">{{ __('Verifikasi sekarang') }}</button>.
                        </form>
                        @if (session('resent'))
                        <p class="d-inline">
                            {{ __(' Kami telah mengirimkan link verifikasi ke email anda, Silahkan cek email anda.') }}
                        </p>    
                        @endif
                    </div>
                    </div>
                </div>
            @endif

            @if (session('konfirmasi_berhasil'))
            <div class="alert-md alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>x</span>
                    </button>
                    <div class="container">
                        <div class="col-12">
                        {{ session('konfirmasi_berhasil')}}
                        </div>
                    </div>
                </div>  
            </div>
            @endif
        </div>
    </div>

<section class="hero-section">
<div class="hero-items owl-carousel">
    @foreach ($banner as $data)
    <div class="single-hero-items set-bg" data-setbg="{{asset('banner/'.$data->gambar)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <span class="text-dark">Temukan fashion favorit kamu hanya di</span>    
                    <h1>Rainbow</h1>
                    <p class="text-dark">Rainbow.com adalah situs belanja online fashion ternama 
                    di Makassar. Rainbow menjual ratusan brand lokal dan internasional, termasuk produk in-house 
                    asal Bandung.
                    </p>
                    <a href="#" class="primary-btn">Belanja Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</section>
<br>

<div class="row text-center mt-5">
    <div class="col">
        <h2 class="font-weight-bold produkTerbaru ">Produk Terbaru</h2>
        <p class="text-dark">Temukan berbagai produk fashion terbaru dari kami dan rasakan kualitas premium harga terjangkau.</p>
    </div>
</div>
<div class="container-fluid"> 
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="product-slider owl-carousel">
                @foreach ($produk_terbaru as $data)
                <div class="product-item">
                    <a href="{{ route('home.produk.detail', [$data->handtag, $data->id, $data->slug])}}">
                        <div class="pi-pic">
                            <img src="{{asset('image_produk/'.$data->gambar_produk)}}" alt="" />
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$data->kategori}}</div>
                            <a href="{{ route('home.produk.detail', [$data->handtag, $data->id, $data->slug])}}" >
                                <h5 style="color: #F19CAD">{{$data->nama}}</h5>
                            </a>
                            <div class="product-price">
                                IDR {{ number_format($data->harga, 0, ',', '.') }}
                            </div>
                            <br>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>   
<br>

<div class="row text-center mt-3">
    <div class="col">
        <h2 class="font-weight-bold produkTerbaru ">Produk Terlaris</h2>
        <p class="text-dark">Temukan berbagai produk fashion terlaris dari kami dan rasakan kualitas premium harga terjangkau.</p>
    </div>
</div>
<div class="related-products spad mt-5">
    <div class="container">
        <div class="row"> 
            @foreach ($produk_terlaris as $data)
            <div class="col-lg-3 col-sm-4 col-md-4 col-6">
                <a href="{{ route('home.produk.detail', [$data->handtag, $data->id, $data->slug])}}">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{asset('image_produk/'.$data->gambar_produk)}}" alt="" />
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$data->kategori}}</div>
                            <a href="{{ route('home.produk.detail', [$data->handtag, $data->id, $data->slug])}}">
                                <h6 style="color: #F19CAD">{{$data->nama}}</h6>
                            </a>
                            <div class="product-price">
                                IDR {{ number_format($data->harga, 0, ',', '.') }}
                            </div>
                            <br>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('instagram')
<div class="instagram-photo">
    @foreach ($instagram as $data)
    <div class="insta-item set-bg" data-setbg="{{asset('instagram/'.$data->gambar)}}">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="{{$data->link_post_ig}}">Rainbow</a></h5>
        </div>
    </div>
    @endforeach
</div>
@endsection