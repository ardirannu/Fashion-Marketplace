@extends('home.layouts.master')

@section('title')
    Rainbow | Marketplace
@endsection

@section('content')
<div class="row justify-content-center text-center">
    <div class="col-lg-12">
        <div class=" mt-5">
            <h2 class="font-weight-bold">Cari Produk</h2>
            <p>Temukan berbagai produk fashion terbaru dari kami dan rasakan kualitas premium harga terjangkau.</p>
        </div>
    </div>
</div>
<!-- Header End -->
<form action="{{ route('home.produk.kategori.search', [$paramSearch])}}" method="GET">
    <div class="container">
        <div class="form-row mt-4 mb-5 justify-content-center allform">
            <!-- <div class="col-md-2 col-0"></div> -->
            <div class="col-lg-3  col-7">
                <input type="text" name="nama" class="form-control" placeholder="Cari Produk">
            </div>
            <div class="col-lg-2 col-5">
                <select name="handtag" class="custom-select mr-sm-2 cobain" id="inlineFormCustomSelect">
                    <option selected disabled>Pilih Handtag</option>
                    <option value="Rainbow" @if(old('handtag') == 'rainbow') selected @endif>Rainbow</option>
                    <option value="Standpoint" @if(old('handtag') == 'standpoint') selected @endif>Standpoint</option>
                    <option value="Polar" @if(old('handtag') == 'polar') selected @endif>Polar</option>
                    <option value="Surfing" @if(old('handtag') == 'surfing') selected @endif>Surfing</option>
                    <option value="Giselle" @if(old('handtag') == 'giselle') selected @endif>Giselle</option>
                    <option value="Glasgo" @if(old('handtag') == 'glasgo') selected @endif>Glasgo</option>
                    <option value="Huahin" @if(old('handtag') == 'huahin') selected @endif>Huahin</option>
                    <option value="Sport&surfing" @if(old('handtag') == 'sport&surfing') selected @endif>Sport & Surfing</option>
                    <option value="Ols" @if(old('handtag') == 'ols') selected @endif>OLS</option>
                    <option value="Sport" @if(old('handtag') == 'sport') selected @endif>Sport</option>
                    <option value="Superrich" @if(old('handtag') == 'superrich') selected @endif>Super Rich</option>
                    <option value="Dendev" @if(old('handtag') == 'dendev') selected @endif>Dendev</option>
                    <option value="Lemon" @if(old('handtag') == 'lemon') selected @endif>Lemon Tree</option>
                    <option value="Dickis" @if(old('handtag') == 'dickis') selected @endif>Dickis, 3ND, Jackhoobs</option>
                    <option value="Supersimple" @if(old('handtag') == 'supersimple') selected @endif>Super Simple</option>
                    <option value="Zifanny" @if(old('handtag') == 'zifanny') selected @endif>Zifanny</option>
                    <option value="Ziffan" @if(old('handtag') == 'ziffan') selected @endif>Ziffan</option>
                    <option value="Volcom" @if(old('handtag') == 'volcom') selected @endif>Volcom</option>
                </select>
            </div>
            <div class="col-lg-2 col-5 optionBtn">
                <select name="kisaran_harga" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected disabled>Kisaran Harga</option>
                    <option value="1">Dibawah Rp. 100.000</option>
                    <option value="2">Rp. 100.000 - 500.000</option>
                    <option value="3">Rp. 500.000 - 1.000.000</option>
                    <option value="4">Diatas Rp. 1.000.000</option>
                </select>
            </div>
            <div class="col-lg-2 col-5 optionBtn">
                <button type="submit" class="btn button btn-block">Cari Produk</button>
            </div>
        </div>
    </div>
</form>


<!-- Related Products Section End -->
<div class="related-products spad">
    <div class="container">
        @if (!$search->isEmpty())
        @else
            <b><p class="text-center">Mohon maaf, produk yang anda cari tidak tersedia</p></b>             
        @endif
        <div class="row">
            @foreach ($search as $data)
            <div class="col-lg-3 col-sm-4 col-md-4 col-6">
                <a href="{{ route('home.produk.detail', [$data->handtag, $data->id, $data->slug])}}">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{asset('image_produk/'.$data->gambar_produk)}}" alt="" />
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$data->kategori}}</div>
                            <a href="#">
                                <h5 style="color: #F19CAD">{{$data->nama}}</h5>
                            </a>
                            <div class="product-price">
                                IDR {{$data->harga}}
                            </div>
                            <br>
                        </div> 
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div>{{ $search->links('home.pagination') }}</div>
    </div>
</div>
 
@endsection