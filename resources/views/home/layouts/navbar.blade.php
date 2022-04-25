<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index')}}">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto font-weight-normal">
                <li class="nav-item">
                    <a class="nav-link navColor @if (Request::segment(1) == 'produk' and Request::segment(2) == 'kategori' and Request::segment(3) == 'kaos') bg-dark rounded @endif" href="{{ route('home.produk.kategori.kaos')}}"><b>Kaos</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navColor @if (Request::segment(1) == 'produk' and Request::segment(2) == 'kategori' and Request::segment(3) == 'kemeja') bg-dark rounded @endif" href="{{ route('home.produk.kategori.kemeja')}}"><b>Kemeja</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navColor @if (Request::segment(1) == 'produk' and Request::segment(2) == 'kategori' and Request::segment(3) == 'hoodie') bg-dark rounded @endif" href="{{ route('home.produk.kategori.hoodie')}}"><b>Hoodie</b></a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link navColor @if (Request::segment(1) == 'produk' and Request::segment(2) == 'kategori' and Request::segment(3) == 'sweater') bg-dark rounded @endif" href="{{ route('home.produk.kategori.sweater')}}"><b>Sweater</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navColor @if (Request::segment(1) == 'produk' and Request::segment(2) == 'kategori' and Request::segment(3) == 'jaket') bg-dark rounded @endif" href="{{ route('home.produk.kategori.jaket')}}"><b>Jaket</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navColor @if (Request::segment(1) == 'produk' and Request::segment(2) == 'kategori' and Request::segment(3) == 'celana') bg-dark rounded @endif" href="{{ route('home.produk.kategori.celana')}}"><b>Celana</b></a>
                </li>
            </ul>
            @if (Auth::check())
                <p class="mt-3">Hai, {{Auth::user()->name}}</p>
            @endif 
            <ul class="nav-right">
                <li class="cart-icon">
                    <div class="row">
                        <div class="col-7-mt-5 ml-3">
                            <button class="btn btn-secondary btn-lg keranjangButton text-white "><a href="{{ route('home.keranjang')}}"
                                    class="tes">
                                    Keranjang
                                    <i class="icon_bag_alt"></i>
                                    @if (Auth::check())
                                        <span class="numberCard">{{Auth::user()->keranjang->count()}}</span>
                                    @endif
                                </a>
                            </button>
                        </div>  
                        <div class="col-6-mt-5">  
                            @if (Auth::check())
                            <button class="btn btn-outline btn-sm masukDaftar">
                                <a class="nav-link masukDaftar" href="{{ route('home.akun')}}">Akun Saya<span class="sr-only">(current)</span></a>
                            </button>
                            @endif

                            @if (Auth::guest())
                            <button class="btn btn-outline btn-sm masukDaftar">
                                <a class="nav-link masukDaftar" href="{{ route('login')}}">Masuk / Daftar <span class="sr-only">(current)</span></a>
                            </button>
                            @endif
                          
                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>