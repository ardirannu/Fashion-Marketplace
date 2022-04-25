@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection

@push('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.css"/>
@endpush

@section('header')
    Edit Produk
@endsection 

@section('content')
<div class="section-body">
    <div class="card">
    <div class="card-body">
    <form action="{{ route('produk.update', $produk->id )}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
    <div class="row"> 
      <div class="col-6">
          <div class="form-group">
              <label>Nama Produk * @error('nama') <b @error('nama') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                      Aa 
                  </div>
                </div>
                <input type="text" name="nama" value="{{ $produk->nama }}" class="form-control currency">
              </div>
          </div>
      </div>
      <div class="col-6">
          <div class="form-group">
              <label>Kategori *  @error('kategori') <b @error('kategori') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="fas fa-project-diagram"></i>
                  </div>
                </div>
                <select name="kategori" class="form-control" id="selectKategori" disabled>
                  <option value="" hidden>Pilih Kategori</option>
                  <option name="kategori" id="kategoriKaos" value="Kaos" @if(old('kategori') == 'kaos') selected @endif {{ $produk->kategori == "Kaos" ? 'selected' : '' }}>Kaos</option>
                  <option name="kategori" id="kategoriKemeja" value="Kemeja" @if(old('kategori') == 'kemeja') selected @endif {{ $produk->kategori == "Kemeja" ? 'selected' : '' }}>Kemeja</option>
                  <option name="kategori" id="kategoriHoodie" value="Hoodie" @if(old('kategori') == 'hoodie') selected @endif {{ $produk->kategori == "Hoodie" ? 'selected' : '' }}>Hoodie</option>
                  <option name="kategori" id="kategoriSweater" value="Sweater" @if(old('kategori') == 'sweater') selected @endif {{ $produk->kategori == "Sweater" ? 'selected' : '' }}>Sweater</option>
                  <option name="kategori" id="kategoriJaket" value="Jaket" @if(old('kategori') == 'jaket') selected @endif> {{ $produk->kategori == "Jaket" ? 'selected' : '' }}Jaket</option>
                  <option name="kategori" id="kategoriCelana" value="Celana" @if(old('kategori') == 'celana') selected @endif {{ $produk->kategori == "Celana" ? 'selected' : '' }}>Celana</option>
                </select>
              </div>
          </div>
      </div>
    </div>
    <div class="row"> 
      <div class="col-6">
          <div class="form-group">
              <label>Handtag</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="fas fa-tag"></i>
                  </div>
                </div>
                <select name="handtag" class="form-control">
                  <option value="" hidden>Pilih Handtag</option>
                  <option name="handtag" value="Rainbow" @if(old('handtag') == 'rainbow') selected @endif {{ $produk->handtag == "Rainbow" ? 'selected' : '' }}>Rainbow</option>
                  <option name="handtag" value="Standpoint" @if(old('handtag') == 'standpoint') selected @endif {{ $produk->handtag == "Standpoint" ? 'selected' : '' }}>Standpoint</option>
                  <option name="handtag" value="Polar" @if(old('handtag') == 'polar') selected @endif {{ $produk->handtag == "Polar" ? 'selected' : '' }}>Polar</option>
                  <option name="handtag" value="Surfing" @if(old('handtag') == 'surfing') selected @endif {{ $produk->handtag == "Surfing" ? 'selected' : '' }}>Surfing</option>
                  <option name="handtag" value="Giselle" @if(old('handtag') == 'giselle') selected @endif {{ $produk->handtag == "Giselle" ? 'selected' : '' }}>Giselle</option>
                  <option name="handtag" value="Glasgo" @if(old('handtag') == 'glasgo') selected @endif {{ $produk->handtag == "Glasgo" ? 'selected' : '' }}>Glasgo</option>
                  <option name="handtag" value="Huahin" @if(old('handtag') == 'huahin') selected @endif {{ $produk->handtag == "Huahin" ? 'selected' : '' }}>Huahin</option>
                  <option name="handtag" value="Sport&surfing" @if(old('handtag') == 'sport&surfing') selected @endif {{ $produk->handtag == "Sport&surfing" ? 'selected' : '' }}>Sport & Surfing</option>
                  <option name="handtag" value="Ols" @if(old('handtag') == 'ols') selected @endif {{ $produk->handtag == "Ols" ? 'selected' : '' }}>OLS</option>
                  <option name="handtag" value="Sport" @if(old('handtag') == 'sport') selected @endif {{ $produk->handtag == "Sport" ? 'selected' : '' }}>Sport</option>
                  <option name="handtag" value="Superrich" @if(old('handtag') == 'superrich') selected @endif {{ $produk->handtag == "Superrich" ? 'selected' : '' }}>Super Rich</option>
                  <option name="handtag" value="Dendev" @if(old('handtag') == 'dendev') selected @endif {{ $produk->handtag == "Dendev" ? 'selected' : '' }}>Dendev</option>
                  <option name="handtag" value="Lemon" @if(old('handtag') == 'lemon') selected @endif {{ $produk->handtag == "Lemon" ? 'selected' : '' }}>Lemon Tree</option>
                  <option name="handtag" value="Dickis" @if(old('handtag') == 'dickis') selected @endif {{ $produk->handtag == "Dickis" ? 'selected' : '' }}>Dickis, 3ND, Jackhoobs</option>
                  <option name="handtag" value="Supersimple" @if(old('handtag') == 'supersimple') selected @endif {{ $produk->handtag == "Supersimple" ? 'selected' : '' }}>Super Simple</option>
                  <option name="handtag" value="Zifanny" @if(old('handtag') == 'zifanny') selected @endif {{ $produk->handtag == "Zifanny" ? 'selected' : '' }}>Zifanny</option>
                  <option name="handtag" value="Ziffan" @if(old('handtag') == 'ziffan') selected @endif {{ $produk->handtag == "Ziffan" ? 'selected' : '' }}>Ziffan</option>
                  <option name="handtag" value="Volcom" @if(old('handtag') == 'volcom') selected @endif {{ $produk->handtag == "Volcom" ? 'selected' : '' }}>Volcom</option>
                </select>
              </div>
          </div>
      </div>
      <div class="col-6">
          <div class="form-group">
              <label>Ukuran Tersedia * </label>
              <div class="input-group" id="ukuranBaju" @if ($produk->kategori == "Celana") hidden @endif >
                <div class="selectgroup selectgroup-pills">
                  @php
                    $ukuran_s = 'S';    
                    $ukuran_m = 'M';    
                    $ukuran_l = 'L';    
                    $ukuran_xl = 'XL';  
                    $data_ukuran = $produk->ukuran;  
                  @endphp
                  @if (in_array($ukuran_s, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="S" class="selectgroup-input" checked>
                    <span class="selectgroup-button">S</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="S" class="selectgroup-input">
                    <span class="selectgroup-button">S</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_m, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="M" class="selectgroup-input" checked>
                    <span class="selectgroup-button">M</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="M" class="selectgroup-input">
                    <span class="selectgroup-button">M</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_l, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="L" class="selectgroup-input" checked>
                    <span class="selectgroup-button">L</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="L" class="selectgroup-input">
                    <span class="selectgroup-button">L</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_xl, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="XL" class="selectgroup-input" checked>
                    <span class="selectgroup-button">XL</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="XL" class="selectgroup-input">
                    <span class="selectgroup-button">XL</span>
                  </label>
                  @endif
                </div>
              </div>

              <div class="input-group" id="ukuranCelana" @if ($produk->kategori == "Kaos" or $produk->kategori == "Kemeja" or $produk->kategori == "Hoodie" or $produk->kategori == "Jaket" or $produk->kategori == "Sweater") hidden @endif >
                <div class="selectgroup selectgroup-pills">
                  @php
                    $ukuran_27 = 27;    
                    $ukuran_28 = 28;    
                    $ukuran_29 = 29;    
                    $ukuran_30 = 30;    
                    $ukuran_31 = 31;    
                    $ukuran_32 = 32;    
                    $ukuran_33 = 33;    
                    $ukuran_34 = 34;    
                    $ukuran_35 = 35;    
                    $ukuran_36 = 36;    
                    $ukuran_37 = 37;    
                    $ukuran_38 = 38;     
                  @endphp
                  @if (in_array($ukuran_27, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="27" class="selectgroup-input" checked>
                    <span class="selectgroup-button">27</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="27" class="selectgroup-input">
                    <span class="selectgroup-button">27</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_28, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="28" class="selectgroup-input" checked>
                    <span class="selectgroup-button">28</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="28" class="selectgroup-input">
                    <span class="selectgroup-button">28</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_29, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="29" class="selectgroup-input" checked>
                    <span class="selectgroup-button">29</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="29" class="selectgroup-input">
                    <span class="selectgroup-button">29</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_30, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="30" class="selectgroup-input" checked>
                    <span class="selectgroup-button">30</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="30" class="selectgroup-input">
                    <span class="selectgroup-button">30</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_31, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="31" class="selectgroup-input" checked>
                    <span class="selectgroup-button">31</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="31" class="selectgroup-input">
                    <span class="selectgroup-button">31</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_32, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="32" class="selectgroup-input" checked>
                    <span class="selectgroup-button">32</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="32" class="selectgroup-input">
                    <span class="selectgroup-button">32</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_33, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="33" class="selectgroup-input" checked>
                    <span class="selectgroup-button">33</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="33" class="selectgroup-input">
                    <span class="selectgroup-button">33</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_34, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="34" class="selectgroup-input" checked>
                    <span class="selectgroup-button">34</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="34" class="selectgroup-input">
                    <span class="selectgroup-button">34</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_35, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="35" class="selectgroup-input" checked>
                    <span class="selectgroup-button">35</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="35" class="selectgroup-input">
                    <span class="selectgroup-button">35</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_36, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="36" class="selectgroup-input" checked>
                    <span class="selectgroup-button">36</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="36" class="selectgroup-input">
                    <span class="selectgroup-button">36</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_37, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="37" class="selectgroup-input" checked>
                    <span class="selectgroup-button">37</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="37" class="selectgroup-input">
                    <span class="selectgroup-button">37</span>
                  </label>
                  @endif
                  @if (in_array($ukuran_38, $data_ukuran))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="38" class="selectgroup-input" checked>
                    <span class="selectgroup-button">38</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="ukuran[]" value="38" class="selectgroup-input">
                    <span class="selectgroup-button">38</span>
                  </label>
                  @endif
                </div>
              </div>
          </div>
      </div>
    </div>
    <div class="row"> 
      <div class="col-12">
          <div class="form-group">
              <label>Warna Tersedia *</label>
              <div class="input-group">
                <div class="selectgroup selectgroup-pills">
                  @php
                    $putih = 'Putih';    
                    $biru = 'Biru';    
                    $kuning = 'Kuning';    
                    $merah = 'Merah';  
                    $cream = 'Cream';  
                    $hitam = 'Hitam';  
                    $lillac = 'Lillac';  
                    $full = 'Full Color';  
                    $loreng = 'Loreng';  
                    $data_warna = $produk->warna;  
                  @endphp

                  @if (in_array($putih, $data_warna))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Putih" class="selectgroup-input" checked>
                    <span class="selectgroup-button">Putih</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Putih" class="selectgroup-input" >
                    <span class="selectgroup-button">Putih</span>
                  </label>
                  @endif

                  @if (in_array($biru, $data_warna))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Biru" class="selectgroup-input" checked>
                    <span class="selectgroup-button">Biru</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Biru" class="selectgroup-input">
                    <span class="selectgroup-button">Biru</span>
                  </label>
                  @endif

                  @if (in_array($kuning, $data_warna))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Kuning" class="selectgroup-input" checked>
                    <span class="selectgroup-button">Kuning</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Kuning" class="selectgroup-input">
                    <span class="selectgroup-button">Kuning</span>
                  </label>
                  @endif

                  @if (in_array($merah, $data_warna))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Merah" class="selectgroup-input" checked>
                    <span class="selectgroup-button">Merah</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Merah" class="selectgroup-input">
                    <span class="selectgroup-button">Merah</span>
                  </label>
                  @endif

                  @if (in_array($cream, $data_warna))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Cream" class="selectgroup-input" checked>
                    <span class="selectgroup-button">Cream</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Cream" class="selectgroup-input">
                    <span class="selectgroup-button">Cream</span>
                  </label>
                  @endif

                  @if (in_array($hitam, $data_warna))
                  <label class="selectgroup-item">
                      <input type="checkbox" name="warna[]" value="Hitam" class="selectgroup-input" checked>
                      <span class="selectgroup-button">Hitam</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Hitam" class="selectgroup-input">
                    <span class="selectgroup-button">Hitam</span>
                  </label>
                  @endif

                  @if (in_array($lillac, $data_warna))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Lillac" class="selectgroup-input" checked>
                    <span class="selectgroup-button">Lillac</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Lillac" class="selectgroup-input">
                    <span class="selectgroup-button">Lillac</span>
                  </label>
                  @endif

                  @if (in_array($full, $data_warna))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Full Color" class="selectgroup-input" checked>
                    <span class="selectgroup-button">Full Color</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Full Color" class="selectgroup-input">
                    <span class="selectgroup-button">Full Color</span>
                  </label>
                  @endif

                  @if (in_array($loreng, $data_warna))
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Loreng" class="selectgroup-input" checked>
                    <span class="selectgroup-button">Loreng</span>
                  </label>
                  @else 
                  <label class="selectgroup-item">
                    <input type="checkbox" name="warna[]" value="Loreng" class="selectgroup-input">
                    <span class="selectgroup-button">Loreng</span>
                  </label>
                  @endif
                 
                </div>
              </div>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
          <div class="form-group">
          <label>Bahan</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="fas fa-tag"></i>
                  </div>
              </div>
          <select name="bahan" class="form-control">
              <option value="" hidden>Pilih Bahan</option>
              <option name="bahan" value="Cotton" @if(old('bahan') == 'cotton') selected @endif {{ $produk->bahan == "Cotton" ? 'selected' : '' }}>Cotton</option>
              <option name="bahan" value="Cotton Combed" @if(old('bahan') == 'cotton_combed') selected @endif {{ $produk->bahan == "Cotton Combed" ? 'selected' : '' }}>Cotton Combed</option>
              <option name="bahan" value="Cotton Mistik" @if(old('bahan') == 'cotton_mistik') selected @endif {{ $produk->bahan == "Cotton Mistik" ? 'selected' : '' }}>Cotton Mistik</option>
              <option name="bahan" value="Delson" @if(old('bahan') == 'delson') selected @endif {{ $produk->bahan == "Delson" ? 'selected' : '' }}>Delson</option>
              <option name="bahan" value="Flanel" @if(old('bahan') == 'flanel') selected @endif {{ $produk->bahan == "Flanel" ? 'selected' : '' }}>Flanel</option>
              <option name="bahan" value="Babyteri" @if(old('bahan') == 'babyteri') selected @endif {{ $produk->bahan == "Babyteri" ? 'selected' : '' }}>Babyteri</option>
              <option name="bahan" value="Premium" @if(old('bahan') == 'premium') selected @endif {{ $produk->bahan == "Premium" ? 'selected' : '' }}>Premium</option>
              <option name="bahan" value="Jeans" @if(old('bahan') == 'jeans') selected @endif {{ $produk->bahan == "Jeans" ? 'selected' : '' }}>Jeans</option>
              <option name="bahan" value="Chinos" @if(old('bahan') == 'chinos') selected @endif {{ $produk->bahan == "Chinos" ? 'selected' : '' }}>Chinos</option>
            </select>
          </div>
      </div>
      </div>
      <div class="col-6">
          <div class="form-group">
              <label>Deskripsi * @error('deskripsi') <b @error('deskripsi') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
              <textarea name="deskripsi" class="summernote-simple" style="margin-top: 0px; margin-bottom: 0px; height: 50px; width: 100%;">{{ $produk->deskripsi }}</textarea>
          </div>
      </div>
      <div class="col-6">
          <div class="form-group">
              <label>Harga * @error('harga') <b @error('harga') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="fas fa-dollar-sign"></i>
                  </div>
                </div>
                <input type="number" name="harga" class="form-control currency" value="{{ $produk->harga }}">
              </div>
          </div>
      </div>
      <div class="col-6">
          <div class="form-group">
              <label>Stok</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="fas fa-boxes"></i>
                  </div>
                </div>
                <input type="number" name="stok" class="form-control currency"  value="{{ $produk->stok }}">
              </div>
          </div>
      </div>
      <div class="col-6">
          <div class="form-group">
              <label>Gambar Produk 1 @error('gambar_produk') <b @error('gambar_produk') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="fas fa-image"></i>
                  </div>
                </div>
                <input type="file" name="gambar_produk" class="form-control currency">
              </div>
          </div>
      </div>
      <div class="col-6">
          <div class="form-group">
              <label>Gambar Produk 2 @error('gambar_produk_2') <b @error('gambar_produk_2') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="fas fa-image"></i>
                  </div>
                </div>
                <input type="file" name="gambar_produk_2" class="form-control currency">
              </div>
          </div>
      </div>
      <div class="col-6">
          <div class="form-group">
              <label>Gambar Produk 3 @error('gambar_produk_3') <b @error('gambar_produk_3') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="fas fa-image"></i>
                  </div>
                </div>
                <input type="file" name="gambar_produk_3" class="form-control currency">
              </div>
          </div>
      </div>
      <div class="col-6">
          <div class="form-group">
              <label>Gambar Produk 4 @error('gambar_produk_4') <b @error('gambar_produk_4') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="fas fa-image"></i>
                  </div>
                </div>
                <input type="file" name="gambar_produk_4" class="form-control currency">
              </div>
          </div>
      </div>
      <div class="card-footer right">
        <div class="text-right">
        <a class="btn btn-primary" href="{{ route('produk.index')}}">Kembali</a>
        <button type="submit" class="btn btn-warning">Update</button>
      </div>
      </div>
    </div>
    </div>
    </form>
  </div>
</div>
</div>
@endsection

@push('after-scripts')
<script>
     // select option hidden jika select kategori = celana
     $('#selectKategori').change(function(){
            if ($(this).val() == 'Celana'){ // or this.value == 'Celana'
                $('#ukuranCelana').removeAttr('hidden');
                $('#ukuranBaju').attr('hidden','');
            }
            if ($(this).val() == 'Kaos' || $(this).val() == 'Hoodie' || $(this).val() == 'Kemeja' || $(this).val() == 'Sweater' || $(this).val() == 'Jaket'){ // or this.value == 'Celana'
                $('#ukuranBaju').removeAttr('hidden');
                $('#ukuranCelana').attr('hidden','');
            }
        });
</script>
@endpush