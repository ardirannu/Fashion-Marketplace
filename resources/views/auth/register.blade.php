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
                <div class="row justify-content-center text-center mt-5">
                    <div class="col">
                        <h3 class="font-weight-bolder">Daftar Akun Baru</h3>
                    </div>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-row justify-content-center mt-5">
                        <div class="col-md-4 mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('name') }}" autocomplete="name" autofocus required>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center mt-4">
                        <div class="col-md-4 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email@contoh.com" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror    
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Min 8 Karakter" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center mt-4">
                        <div class="col-md-3 mb-3">
                            <label for="no_hp">Nomor handphone</label>
                            <input type="number" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" required>
                            @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="jkl">Jenis Kelamin</label>
                            <select class="custom-select" id="jkl" name="jkl" class="form-control @error('jkl') is-invalid @enderror" value="{{ old('jkl') }}" required>
                                <option hidden>Pilih</option>
                                <option value="Laki-Laki" @if(old('jkl') == 'Laki-Laki') selected @endif>Laki - laki</option>
                                <option value="Perempuan" @if(old('jkl') == 'Perempuan') selected @endif>Perempuan</option>
                            </select>
                            @error('jkl')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Zip" required>
                            @error('tgl_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <button class="btn btn-secondary keranjangButton text-white text-uppercase px-5"
                            type="submit">buat akun</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- sesi Mobile -->
    <div class="d-md-none d-sm-block">
        <div class="text-center cobba">
            <h4 class="font-weight-bold">Daftar Akun Baru</h4>
        </div>
        <div class="container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row mt-4 justify-content-center">
                    <div class="col-10">
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('name') }}" autocomplete="name" autofocus required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <div class="col-10">
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email@contoh.com" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <div class="col-10">
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Min 8 Karakter" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <div class="col-10">
                        <input type="number" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" placeholder="No. Handphone" required>
                        @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <div class="col-10">
                        <select id="jkl" name="jkl" class="form-control @error('jkl') is-invalid @enderror" value="{{ old('jkl') }}" required>
                            <option hidden>Jenis Kelamin</option>
                            <option value="Laki-Laki" @if(old('jkl') == 'Laki-Laki') selected @endif>Laki - laki</option>
                            <option value="Perempuan" @if(old('jkl') == 'Perempuan') selected @endif>Perempuan</option>
                        </select>
                        @error('jkl')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <div class="col-10">
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Zip" required>
                        @error('tgl_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-10">
                        <button type="submit" class="btn-prosesMobile btn-block text-uppercase">Buat Akun</button>
                    </div>
                </div>
                </form>
                <div class="row justify-content-center mt-2">
                    <div class="col-10">
                        <a href="{{ route('login') }}" class="btn-prosesMobile btn-block mb-5 untukOutline hilangBorder">Kembali
                            Ke Halaman Login</a>
                    </div>
                </div>
        </div>
    </div>
    <!-- End Mobile -->
@endsection

