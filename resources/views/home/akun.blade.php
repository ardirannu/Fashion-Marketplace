@extends('home.layouts.master')

@section('title')
    Rainbow | Marketplace
@endsection

@section('content')
    <!-- Tampilan Web -->
    <section class="spad">
        <div class="d-sm-none d-none d-md-block">
            <div class="container">
                <div class="row justify-content-center text-center  mt-4 mb-5">
                    <div class="col">
                        <h3 class="font-weight-bolder">Halaman Akun</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @if (session('ubah_alamat'))
                           <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>x</span>
                                </button>
                                <div class="container">
                                    <div class="col-12">
                                    {{ session('ubah_alamat')}}
                                    </div>
                                </div>
                            </div>  
                        </div>
                        @endif

                        @if (session('tambah_alamat'))
                           <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>x</span>
                                </button>
                                <div class="container">
                                    <div class="col-12">
                                    {{ session('tambah_alamat')}}
                                    </div>
                                </div>
                            </div>  
                        </div>
                        @endif

                        @if ($user_alamat->isEmpty())
                        <div class="alert alert-success alert-dismissible show fade">
                         <div class="alert-body">
                             <button class="close" data-dismiss="alert">
                                 <span>x</span>
                             </button>
                             <div class="container">
                                 <div class="col-12">
                                 Silahkan melengkapi alamat anda, untuk lanjut berbelanja !
                                 </div>
                             </div>
                         </div>  
                     </div>
                     @endif
                    </div>
                </div>
                <div class="shadow-sm p-3 mb-5 bg-white rounded"> 
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <img src="{{asset('image/fotoAkun.svg')}}" class=" fotoAkun mt-1">
                            </div>
                            <div class="col-md-4 namaEmail mt-3">
                                <p class="font-weight-bolder ">{{Auth::user()->name}}</p>
                                <p class="font-weight-light ">{{Auth::user()->email}}</p>
                            </div>
                            <div class="col-md-4 namaEmail mt-3">
                                <p class="font-weight-bolder ">Nomor handphone</p>
                                <p class="font-weight-light ">{{Auth::user()->no_hp}}</p>
                            </div>
                            <div class="col-md-2 mt-3 ">
                                <a class="btn btn-danger px-4" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Keluar') }}
                                   </a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                       @csrf
                                   </form>
                            </div>
                        </div>
                    </div>
                </div>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active paswordLupa" id="nav-home-tab" data-toggle="tab"
                            href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pesanan Anda</a>
                        <a class="nav-item nav-link paswordLupa" id="nav-profile-tab" data-toggle="tab"
                            href="#nav-profile" role="tab" aria-controls="nav-profile"
                            aria-selected="false">Alamat</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-responsive">
                            <table class="table"> 
                                <tr>
                                    <th>No</th>
                                    <th>ID Pesanan</th>
                                    <th>Alamat pengiriman</th>
                                    <th class="text-center">Detail Pesanan</th>
                                    <th>Total pembayaran</th>
                                    <th>Status</th>
                                </tr>
                                @foreach ($pesanan as $no => $data)
                                <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ $data->kode_pesanan }}</td>
                                    <td>
                                        <div class="orderAlamat">
                                            <p>{{$data->alamat_user->nama_jalan}}</p>
                                            <p>{{$data->alamat_user->kota}} - {{$data->alamat_user->provinsi}}</p>
                                        </div>

                                    </td>
                                    <td>
                                        @foreach ($data->pesanan_detail as $detail)
                                        <img src="{{asset('image_produk/'.$detail->produk->gambar_produk)}}" class="gambarDetail" />
                                        <ul class="detailProduk">
                                            <li class="font-weight-bold">{{ $detail->produk->nama }}</li>
                                            <li>Kode Produk :
                                                <span>{{ $detail->produk->kode_produk }}</span>
                                            </li>
                                            <li>Warna :
                                                <span>{{ $detail->warna }}</span>
                                            </li>
                                            <li>Ukuran :
                                                <span>{{ $detail->ukuran }}</span>
                                            </li>
                                            <li>Jumlah :
                                                <span>{{ $detail->jumlah }}</span>
                                            </li>
                                        </ul>
                                        @endforeach
                                    </td>
                                    <td>IDR {{ number_format($data->total_pembayaran, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($data->status == 'Pesanan Berhasil')
                                            <div class="btn btn-sm btn-success text-center mb-2">{{$data->status}}</div>  
                                        @else
                                            <a href="#" data-id="{{$data->kode_pesanan}}" class="btn btn-sm btn-warning text-center btn-konfirmasi">Konfirmasi</a>
                                            {{-- <div class="btn btn-sm btn-warning text-center">Konfirmasi</div> --}}
                                            <p class="small">Konfirmasi pesanan disini!</p>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5 class="mt-4">Alamat Pengiriman</h5>
                                </div>
                            </div>
                            <div class="dataPengirimanMobile mt-3">
                                <p class="font-weight-bolder">{{Auth::user()->name}}</p>
                                @foreach ($user_alamat as $no => $data)
                                    <p>{{$data->nama_jalan}}</p>
                                    <p>{{$data->kota}} - {{$data->provinsi}} - {{$data->kode_pos}}</p>
                                @endforeach
                                @if ($user_alamat->isEmpty())
                                    <a href="#" class="btnDataPengiriman mt-5 btn-tambah-alamat">Tambah Alamat</a>
                                @else
                                    <a href="#" class="btnDataPengiriman mt-5 btn-ubah-alamat">Ubah Alamat</a>
                                @endif
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
        <div class="text-center cobba mb-5">
            <img src="{{asset('image/fotoAkun.svg')}}" style="width: 20%;">
            <div class="namaEmail mt-4">
                <p class="font-weight-bold">{{Auth::user()->name}} </p>
                <p class="font-weight-light">{{Auth::user()->email}}</p>
            </div>
        </div>
        <div class="container">
            <h5 class="text-muted">Order anda</h5>
            <div class="shadow-sm p-3 mb-5 bg-white rounded">
                <div class="widgetPemesananMobile">
                    @foreach ($pesanan as $no => $data)
                        @foreach ($data->pesanan_detail as $detail)
                        <img src="{{asset('image_produk/'.$detail->produk->gambar_produk)}}" class="gambarDetail" />
                        <ul class="detailProduk produkDetailAkun">
                            <li class="font-weight-bold">{{ $detail->produk->nama }}</li>
                            <li>Kode Produk :
                                <span>{{$detail->produk->kode_produk}}</span>
                            </li>
                            <li>Color :
                                <span>{{$detail->warna}}</span>
                            </li>
                            <li>Ukuran :
                                <span>{{$detail->ukuran}}</span>
                            </li>
                            <li>Jumlah :
                                <span>{{$detail->Jumlah}}</span>
                            </li>
                        </ul>
                        @endforeach
                    <ul class="produkMobile">
                        <li>ID Pesanan :
                            <span>{{$data->kode_pesanan}}</span>
                        </li>
                        <li>Total Pembayaran :
                            <span>IDR {{number_format($data->total_pembayaran, 0, ',', '.')}}</span>
                        </li>
                        <li>Status Transaksi:
                            @if ($data->status == 'Pesanan Berhasil')
                                <span>
                                    <div class="alert alert-success text-center" role="alert">
                                        {{$data->status}}
                                    </div>
                                </span> 
                            @else
                                <span>
                                    <a href="#" data-id="{{$data->kode_pesanan}}" class="btn-konfirmasi">
                                    <div class="alert alert-warning text-center" role="alert">
                                        Konfirmasi Pesanan
                                    </div>
                                    </a>
                                </span>
                            @endif
                          
                        </li>
                    </ul>
                    <hr>
                    <br>
                    @endforeach
                </div>
            </div>    
            <div class="shadow-sm p-3 mb-5 bg-white rounded">  
             {{-- Card Mobile Alamat Pengiriman --}}
             <ul class="produkMobile">
                <h5 class="text-muted">Alamat Pengiriman</h5>
                <hr>
                @foreach ($user_alamat as $no => $data)
                <li>
                    <span>{{$data->nama_jalan}}</span>
                </li>
                <li>
                    <span>{{$data->kota}} - {{$data->provinsi}}</span>
                </li>
                <li>
                    {{$data->kode_pos}}
                </li>
                @endforeach
                <hr>
                @if ($user_alamat->isEmpty())
                <span>
                    <div class="alert alert-success text-center btn-mobile-tambah-alamat mb-5" role="alert">
                        Tambah Alamat
                    </div>
                </span>
                @else
                <span>
                    <div class="alert alert-warning text-center btn-mobile-ubah-alamat mb-5" role="alert">
                        Ubah Alamat
                    </div>
                </span>
                @endif 
            </ul> 
            </div>
            <a class="btn btn-danger btn-block mb-5" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             {{ __('Keluar') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    <!-- End Mobile -->

     <!-- Konfirmasi Modal -->
  <div class="modal fade bd-example-modal-md" id="konfirmasiModal" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered justify-content-center modal-md" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Pesanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body justify-content-center text-center">
            <form action="{{ route('home.akun.pesanan_konfirmasi') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                  <div class="form-group">
                      <div class="input-group">
                          <input type="text" name="kode_pesanan" id="id_konfirmasi" hidden>
                          <input type="file" name="resi_pembayaran">
                      </div>
                      <p>Masukkan bukti pembayaran anda berupa gambar bukti transfer !</p>
                  </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn keranjangButton text-white btn-submit-konfirmasi">Konfirmasi</button>
            </form>
          </div>
      </div>
  </div>
  </div>
<!-- End Konfirmasi Modal -->

 <!-- Ubah alamat Modal -->
 <div class="modal fade" id="ubahAlamatModal" tabindex="-1" role="dialog"
 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Alamat</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
           <form action="{{ route('home.akun.ubah_alamat') }}" method="POST">
           @csrf
           <div class="container">
               <div class="row">
                        @foreach ($user_alamat as $no => $data)
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nama Jalan @error('nama_jalan') <b @error('nama_jalan') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror</label>
                                <div class="input-group">
                                <input type="text" name="nama_jalan" class="w-100" value="{{$data->nama_jalan}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Kota @error('kota') <b @error('kota') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror</label>
                                <div class="input-group">
                                <input type="text" name="kota" class="w-100" value="{{$data->kota}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Provinsi @error('provinsi') <b @error('provinsi') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror</label>
                                <div class="input-group">
                                    <select name="provinsi">
                                        <option value="Sulawesi Selatan" {{ $data->provinsi == "Sulawesi Selatan" ? 'selected' : '' }}>Sulawesi Selatan</option>
                                        <option value="Sulawesi Utara" {{ $data->provinsi == "Sulawesi Utara" ? 'selected' : '' }}>Sulawesi Utara</option>
                                        <option value="Sulawesi Tengah" {{ $data->provinsi == "Sulawesi Tengah" ? 'selected' : '' }}>Sulawesi Tengah</option>
                                        <option value="Sulawesi Tenggara" {{ $data->provinsi == "Sulawesi Tenggara" ? 'selected' : '' }}>Sulawesi Tenggara</option>
                                        <option value="Sulawesi Barat" {{ $data->provinsi == "Sulawesi Barat" ? 'selected' : '' }}>Sulawesi Barat</option>
                                        <option value="Gorontalo" {{ $data->provinsi == "Gorontalo" ? 'selected' : '' }}>Gorontalo</option>
                                        <option value="Aceh" {{ $data->provinsi == "Aceh" ? 'selected' : '' }}>Aceh</option>
                                        <option value="Sumatera Utara" {{ $data->provinsi == "Sumatera Utara" ? 'selected' : '' }}>Sumatera Utara</option>
                                        <option value="Sumatera Barat" {{ $data->provinsi == "Sumatera Barat" ? 'selected' : '' }}>Sumatera Barat</option>
                                        <option value="Riau" {{ $data->provinsi == "Riau" ? 'selected' : '' }}>Riau</option>
                                        <option value="Jambi" {{ $data->provinsi == "Jambi" ? 'selected' : '' }}>Jambi</option>
                                        <option value="Sumatera Selatan" {{ $data->provinsi == "Sumatera Selatan" ? 'selected' : '' }}>Sumatera Selatan</option>
                                        <option value="Bengkulu" {{ $data->provinsi == "Bengkulu" ? 'selected' : '' }}>Bengkulu</option>
                                        <option value="Lampung" {{ $data->provinsi == "Lampung" ? 'selected' : '' }}>Lampung</option>
                                        <option value="Kep. Bangka Belitung" {{ $data->provinsi == "Kep. Bangka Belitung" ? 'selected' : '' }}>Kep. Bangka Belitung</option>
                                        <option value="Kepulauan Riau" {{ $data->provinsi == "Kepulauan Riau" ? 'selected' : '' }}>Kepulauan Riau</option>
                                        <option value="Jakarta" {{ $data->provinsi == "Jakarta" ? 'selected' : '' }}>Jakarta</option>
                                        <option value="Jawa Barat" {{ $data->provinsi == "Jawa Barat" ? 'selected' : '' }}>Jawa Barat</option>
                                        <option value="Banten" {{ $data->provinsi == "Banten" ? 'selected' : '' }}>Banten</option>
                                        <option value="Jawa Tengah" {{ $data->provinsi == "Jawa Tengah" ? 'selected' : '' }}>Jawa Tengah</option>
                                        <option value="Yogyakarta" {{ $data->provinsi == "Yogyakarta" ? 'selected' : '' }}>Yogyakarta</option>
                                        <option value="Jawa Timur" {{ $data->provinsi == "Jawa Timur" ? 'selected' : '' }}>Jawa Timur</option>
                                        <option value="Kalimantan Barat" {{ $data->provinsi == "Kalimantan Barat" ? 'selected' : '' }}>Kalimantan Barat</option>
                                        <option value="Kalimantan Tengah" {{ $data->provinsi == "Kalimantan Tengah" ? 'selected' : '' }}>Kalimantan Tengah</option>
                                        <option value="Kalimantan Selatan" {{ $data->provinsi == "Kalimantan Selatan" ? 'selected' : '' }}>Kalimantan Selatan</option>
                                        <option value="Kalimantan Timur" {{ $data->provinsi == "Kalimantan Timur" ? 'selected' : '' }}>Kalimantan Timur</option>
                                        <option value="Kalimantan Utara" {{ $data->provinsi == "Kalimantan Utara" ? 'selected' : '' }}>Kalimantan Utara</option>
                                        <option value="Bali" {{ $data->provinsi == "Bali" ? 'selected' : '' }}>Bali</option>
                                        <option value="Nusa Tenggara Timur" {{ $data->provinsi == "Nusa Tenggara Timur" ? 'selected' : '' }}>Nusa Tenggara Timur</option>
                                        <option value="Nusa Tenggara Barat" {{ $data->provinsi == "Nusa Tenggara Barat" ? 'selected' : '' }}>Nusa Tenggara Barat</option>
                                        <option value="Maluku" {{ $data->provinsi == "Maluku" ? 'selected' : '' }}>Maluku</option>
                                        <option value="Maluku Utara" {{ $data->provinsi == "Maluku Utara" ? 'selected' : '' }}>Maluku Utara</option>
                                        <option value="Papua" {{ $data->provinsi == "Papua" ? 'selected' : '' }}>Papua</option>
                                        <option value="Papua Barat" {{ $data->provinsi == "Papua Barat" ? 'selected' : '' }}>Papua Barat</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Kode Pos @error('kode_pos') <b @error('kode_pos') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror</label>
                                <div class="input-group">
                                <input type="text" name="kode_pos" class="w-100" value="{{$data->kode_pos}}">
                                </div>
                            </div>
                        </div>
                        @endforeach
               </div>
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-outline" data-dismiss="modal">Keluar</button>
           <button type="submit" class="btn keranjangButton text-white">Ubah Alamat</button>
           </form>
         </div>
     </div>
 </div>
 </div>
<!-- End ubah alamat Modal -->

 <!-- Tambah alamat Modal -->
 <div class="modal fade" id="tambahAlamatModal" tabindex="-1" role="dialog"
 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Alamat</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
           <form action="{{ route('home.akun.tambah_alamat') }}" method="POST">
           @csrf
           <div class="container">
               <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nama Jalan @error('nama_jalan') <b @error('nama_jalan') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror</label>
                                <div class="input-group">
                                <input type="text" name="nama_jalan" class="w-100">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Kota @error('kota') <b @error('kota') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror</label>
                                <div class="input-group">
                                <input type="text" name="kota" class="w-100">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Provinsi @error('provinsi') <b @error('provinsi') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror</label>
                                <div class="input-group">
                                    <select name="provinsi">
                                        <option value="" hidden>Pilih Provinsi</option>

                                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                                        <option value="Gorontalo">Gorontalo</option>
                                        <option value="Aceh">Aceh</option>
                                        <option value="Sumatera Utara">Sumatera Utara</option>
                                        <option value="Sumatera Barat">Sumatera Barat</option>
                                        <option value="Riau">Riau</option>
                                        <option value="Jambi">Jambi</option>
                                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                                        <option value="Bengkulu">Bengkulu</option>
                                        <option value="Lampung">Lampung</option>
                                        <option value="Kep. Bangka Belitung">Kep. Bangka Belitung</option>
                                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                                        <option value="Jakarta">Jakarta</option>
                                        <option value="Jawa Barat">Jawa Barat</option>
                                        <option value="Banten">Banten</option>
                                        <option value="Jawa Tengah">Jawa Tengah</option>
                                        <option value="Yogyakarta">Yogyakarta</option>
                                        <option value="Jawa Timur">Jawa Timur</option>
                                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                                        <option value="Bali">Bali</option>
                                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                        <option value="Maluku">Maluku</option>
                                        <option value="Maluku Utara">Maluku Utara</option>
                                        <option value="Papua">Papua</option>
                                        <option value="Papua Barat">Papua Barat</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Kode Pos @error('kode_pos') <b @error('kode_pos') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror</label>
                                <div class="input-group">
                                <input type="text" name="kode_pos" class="w-100">
                                </div>
                            </div>
                        </div>
               </div>
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-outline" data-dismiss="modal">Keluar</button>
           <button type="submit" class="btn keranjangButton text-white">Tambah Alamat</button>
           </form>
         </div>
     </div>
 </div>
 </div>
<!-- End tambah alamat Modal -->


            
@endsection

@push('page-scripts')
    <script>
        $('.btn-konfirmasi').on('click', function(){
            let id = $(this).data('id')
            $('#konfirmasiModal').find('#id_konfirmasi').val(id)
            $('#konfirmasiModal').modal('show')
        })
    </script>

    <script>
        $('.btn-ubah-alamat').on('click', function(){
            $('#ubahAlamatModal').modal('show')
        })

        $('.btn-mobile-ubah-alamat').on('click', function(){
            $('#ubahAlamatModal').modal('show')
        })
    </script>

    <script>
        $('.btn-tambah-alamat').on('click', function(){
            $('#tambahAlamatModal').modal('show')
        })

        $('.btn-mobile-tambah-alamat').on('click', function(){
            $('#tambahAlamatModal').modal('show')
        })

        @if($errors->any())
            $('#tambahAlamatModal').modal('show')
        @endif
    </script>
@endpush

