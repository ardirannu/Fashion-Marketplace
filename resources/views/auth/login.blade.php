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
                    <h3 class="font-weight-bolder">Silahkan Login</h3>
                </div>
            </div>
            <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group row justify-content-center mt-5">
                <label for="inputEmail3" class="col-md-1 col-form-label">Email</label>
                <div class="col-md-5 ml-4">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="inputPassword3" class="col-md-1 col-form-label">Password</label>
                <div class="col-md-5 ml-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
            <div class="row justify-content-center text-center mt-4  ml-2">
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-secondary  keranjangButton text-white px-5">Login</button>
                </div>
            </div>
            </form>
            <div class="row justify-content-center text-center ml-1 mt-3">
                <div class="col">
                    <a href="{{ route('password.request') }}" class="paswordLupa ml-auto text-center">Lupa Password Anda ?</a>
                </div>
            </div>
            <div class="row justify-content-center text-center ml-1 mt-3">
                <div class="col">
                    <p class="belumPunya">Belum Punya Akun Rainbow? <a href="{{ route('register') }}">Buat Baru</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End -->

<!-- sesi Mobile -->
<div class="d-md-none d-sm-block">
    <div class="text-center cobba">
        <img src="img/logo_website_shayna.png" width="35%">
    </div>
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group row mt-4">
                <div class="col-md-10">
                    <input type="email" name="email" @error('email') is-invalid @enderror" value="{{ old('email') }}" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-md-10">
                    <input type="password" name="password" @error('password') is-invalid @enderror" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn-prosesMobile btn-block text-uppercase">login</button>
            <a href="" class="btn-prosesMobile btn-block mb-3 text-uppercase untukOutline">Kembali</a>
            <div class="row justify-content-center text-center fontMobileLogin">
                <div class="col">
                    <a href="" class="paswordLupa ml-auto text-center">Lupa Password Anda ?</a>
                </div>
            </div>
            <div class="row justify-content-center text-center mt-2 mb-5">
                <div class="col ">
                    <p class="belumPunya fontMobileLogin">Belum Punya Akun Rainbow? <a href="{{ route('register') }}"> Buat Baru</a></p>
                </div>
            </div>
        </form>

    </div>
</div>
<!-- End Mobile -->
@endsection

