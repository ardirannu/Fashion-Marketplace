@extends('home.layouts.master')

@section('title')
    Rainbow | Marketplace
@endsection

@section('content')
    <!-- Product Detail -->
    <section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if (session('success_tambah_keranjang'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>x</span>
                        </button>
                        {{ session('success_tambah_keranjang')}}
                    </div>  
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <img class="product-big-img ukuranDiProduk" src="{{asset('image_produk/'.$produk->gambar_produk)}}" alt="" />
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                <div class="pt active" data-imgbigurl="{{asset('image_produk/'.$produk->gambar_produk)}}">
                                    <img src="{{asset('image_produk/'.$produk->gambar_produk)}}" alt="" />
                                </div>
                                <div class="pt" data-imgbigurl="{{asset('image_produk/'.$produk->gambar_produk_2)}}">
                                    <img src="{{asset('image_produk/'.$produk->gambar_produk_2)}}" alt="" />
                                </div>
                                <div class="pt" data-imgbigurl="{{asset('image_produk/'.$produk->gambar_produk_3)}}">
                                    <img src="{{asset('image_produk/'.$produk->gambar_produk_3)}}" alt="" />
                                </div>

                                <div class="pt" data-imgbigurl="{{asset('image_produk/'.$produk->gambar_produk_4)}}">
                                    <img src="{{asset('image_produk/'.$produk->gambar_produk_4)}}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span>{{$produk->kategori}}</span>
                                <h3>{{$produk->nama}}</h3>
                            </div>  
                            <div class="pd-desc">
                                <p>{{$produk->deskripsi}}</p>
                                <form action="{{ route('home.keranjang.tambah')}} " method="POST">
                                @csrf
                                <div class="row">
                                    <input type="number" name="produk_id" class="form-control" value="{{ $produk->id }}" hidden>
                                    <input type="number" name="harga_produk" class="form-control" value="{{ $produk->harga }}" hidden>
                                    <div class="col-5 mb-3">
                                        <label >Jumlah : </label>
                                        <input type="number" min="1" max="999" name="jumlah" class="form-control" placeholder="Jumlah">
                                        @error('jumlah') <h6 @error('jumlah') class="error_message" @enderror> {{ "(".$message.")" }} </h6> @enderror
                                    </div>
                                    <div class="col-7 mb-3">
                                        <label >Pilih Ukuran : </label>
                                        <select name="ukuran" class="custom-select cobain" id="inlineFormCustomSelect" >
                                            <option selected disabled>Pilih Ukuran</option>
                                            @foreach ($ukuran[0][0]['ukuran'] as $data_ukuran)
                                                <option name="ukuran" value="{{ $data_ukuran }}" @if(old('ukuran') == "{{ $data_ukuran }}") selected @endif >{{ $data_ukuran }}</option>
                                            @endforeach 
                                        </select> 
                                        @error('ukuran') <h6 @error('ukuran') class="error_message" @enderror> {{ "(".$message.")" }} </h6> @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="d-block">Pilih Warna : @error('warna') <h6  @error('warna') class="error_message" @enderror> {{ "(".$message.")" }} </h6> @enderror</label> 
                                        <div class="form-check form-check-inline">
                                            @php
                                                $data_warna = $produk->warna;  
                                            @endphp

                                            @if (in_array("Biru", $data_warna))
                                                <input name="warna" type="checkbox" class="checkbox-biru" value="Biru" />
                                            @endif
                                            @if (in_array("Putih", $data_warna))
                                                <input name="warna" type="checkbox" class="checkbox-putih" value="Putih" />
                                            @endif
                                            @if (in_array("Kuning", $data_warna))
                                            <input name="warna" type="checkbox" class="checkbox-kuning" value="Kuning" />
                                            @endif
                                            @if (in_array("Merah", $data_warna))
                                            <input name="warna" type="checkbox" class="checkbox-merah" value="Merah" />
                                            @endif
                                            @if (in_array("Cream", $data_warna))
                                            <input name="warna" type="checkbox" class="checkbox-cream" value="Cream" />
                                            @endif
                                            @if (in_array("Hitam", $data_warna))
                                            <input name="warna" type="checkbox" class="checkbox-hitam" value="Hitam" />
                                            @endif
                                            @if (in_array("Lillac", $data_warna))
                                            <input name="warna" type="checkbox" class="checkbox-lilac" value="Lillac" />
                                            @endif
                                            @if (in_array("Full Color", $data_warna))
                                            <input name="warna" type="checkbox" class="checkbox-full" value="Full Color" />
                                            @endif
                                            @if (in_array("Loreng", $data_warna))
                                            <input name="warna" type="checkbox" class="checkbox-loreng" value="Loreng" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <h4 style="color: #f0869a;">IDR {{ number_format($produk->harga, 0, ',', '.') }}</h4>
                            </div>
                            <div class="quantity">
                                <button type="submit" class="primary-btn pd-cart">Tambah Keranjang</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Detail-->
 
<div class="row text-center mt-3">
    <div class="col">
        <h2 class="font-weight-bold produkTerbaru ">Rekomendasi</h2>
        <p class="text-dark">Temukan berbagai produk fashion terbaru dari kami dan rasakan kualitas premium harga terjangkau.</p>
    </div>
</div>
<div class="related-products spad mt-5">
    <div class="container">
        <div class="row">
            @foreach ($produk_terbaru as $data)
            <div class="col-lg-3 col-sm-4 col-md-4 col-6">
                <a href="{{ route('home.produk.detail', [$data->handtag, $data->id, $data->slug])}}">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{asset('image_produk/'.$data->gambar_produk)}}" alt="" />
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$data->kategori}}</div>
                            <a href="#">
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
            {{-- @endforeach --}}
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
<script>
    $(document).ready(function(){
        $('input:checkbox').click(function() {
            $('input:checkbox').not(this).prop('checked', false);
        });
    });
</script>
@endpush