<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="">Rainbow</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="">Rainbow</a>
      </div>
      <ul class="sidebar-menu">
        {{-- dinamic active state untuk class active --}}
        <li class="@if (Request::segment(1) == 'admin' and Request::segment(2) == 'dashboard') active @endif">
          <a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
        </li>
          <li class="menu-header">Menu</li>
          {{-- dinamic active state untuk class active --}}
          <li class="@if (Request::segment(2) == 'produk') active @endif"><a href="{{ route('produk.index')}}" class="nav-link" href=><i class="fas fa-gifts"></i> <span>Produk</span></a></li>
          <li class="nav-item dropdown @if (Request::segment(1) == 'admin' and Request::segment(2) == 'pelanggan') active @endif ">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-laptop"></i> <span>Pelanggan</span></a>
            <ul class="dropdown-menu">
              {{-- dinamic active state untuk class active --}}
              <li class=" @if (Request::segment(1) == 'admin' and Request::segment(2) == 'pelanggan' and Request::segment(3) == 'pelanggan') active @endif ">
                <a class="nav-link" href="{{ route('pelanggan.index') }}">Data Pelanggan</a>
              </li>
              <li class=" @if (Request::segment(1) == 'admin' and Request::segment(2) == 'pelanggan' and Request::segment(3) == 'alamat-pelanggan') active @endif ">
                <a class="nav-link" href="{{ route('alamat_pelanggan.index') }}">Alamat Pelanggan</a>
              </li>
            </ul>
          </li>
          <li class="@if (Request::segment(2) == 'Keranjang') active @endif"><a href="{{ route('keranjang.index')}}" class="nav-link"> <i class="fas fa-shopping-cart"></i> <span>Keranjang</span></a></li>
          <li class="nav-item dropdown @if (Request::segment(1) == 'admin' and Request::segment(2) == 'pesanan') active @endif ">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shopping-bag"></i> <span>Pesanan</span></a>
            <ul class="dropdown-menu">
              {{-- dinamic active state untuk class active --}}
              <li class=" @if (Request::segment(1) == 'admin' and Request::segment(2) == 'pesanan' and Request::segment(3) == 'pesanan') active @endif ">
                <a class="nav-link" href="{{ route('pesanan.index') }}">Data Pesanan</a>
              </li>
              <li class=" @if (Request::segment(1) == 'admin' and Request::segment(2) == 'pesanan' and Request::segment(3) == 'pesanan_detail') active @endif ">
                <a class="nav-link" href="{{ route('pesanan_detail.index') }}">Pesanan Detail</a>
              </li>
              <li class=" @if (Request::segment(1) == 'admin' and Request::segment(2) == 'pesanan' and Request::segment(3) == 'pesanan_berhasil') active @endif ">
                <a class="nav-link" href="{{ route('pesanan_berhasil.index') }}">Pesanan Berhasil</a>
              </li>
            </ul>
          </li>
          <li class="@if (Request::segment(2) == 'banner') active @endif"><a href="{{ route('banner.index')}}" class="nav-link"><i class="fas fa-ad"></i><span>Banner</span></a></li>
          <li class="@if (Request::segment(2) == 'instagram') active @endif"><a href="{{ route('instagram.index')}}" class="nav-link"><i class="fas fa-ad"></i><span>Instagram Post</span></a></li>
          @can('akses_menu')
          <li class="@if (Request::segment(2) == 'toko') active @endif"><a href="{{ route('toko.index')}}" class="nav-link"><i class="fas fa-store"></i><span>Toko</span></a></li>
          <li class="@if (Request::segment(2) == 'role') active @endif"><a href="{{ route('role.index')}}" class="nav-link"><i class="fas fa-key"></i><span>Role</span></a></li>
          <li class="@if (Request::segment(2) == 'user') active @endif"><a href="{{ route('user.index')}}" class="nav-link"><i class="fas fa-key"></i><span>Admin</span></a></li>
          @endcan
        </ul>
    </aside>
  </div>