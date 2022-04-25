@extends('home.layouts.master')

@section('title')
    Rainbow | Marketplace
@endsection

@section('content')
 <!-- Tampilan Web -->
 <section class="spad">
    <div class="d-sm-none d-none d-md-block">
        <div class="container">
            <div class="row justify-content-center text-center mt-3">
                <div class="col-md-6">
                    <h3 class="font-weight-bolder text-uppercase text-monospace">terima kasih telah berbelanja di
                        rainbow grosir</h3>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-md-6">
                    <div class="kodePesanan mt-5">
                        <p class="">Kode pesanan anda adalah</p>
                        <p class="font-weight-bold">{{$kode_pesanan}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border-danger">
                        <div class="card-body text-center">
                            <p class="silahkan">
                                Silahkan melakukan pembayaran sejumlah IDR {{ number_format($total_pembayaran, 0, ',', '.') }} ke Nomor Rekening Rainbow yaitu
                            </p>
                            <p class="noRek text-monospace ">
                                2208 1996 1403
                            </p>  
                            <button type="submit" class="btn btn-secondary  keranjangButton text-white" data-toggle="modal" data-target="#exampleModalCenter">Konfirmasi Pembayaran</button>
                            <p class="small">*Silahkan konfirmasi pesanan anda dengan mengirimkan bukti transfer pada tombol Konfirmasi Pembayaran</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row justify-content-center text-center mt-3">
                <div class="col-md-6">
                    <p class="silahkan caraPembayaran">Cara pembayaran menggunakan ATM BCA:</p>
                    <p class="silahkan">Pilih Transaksi Lainnya > Transfer > Ke Rek BCA Virtual Account</p>
                    <p class="silahkan">Masukkan nomor BCA Virtual Account kamu <b>700711573581338857</b> dan pilih
                        <b>Benar</b></p>
                    <p class="silahkan">Pastikan informasi nama dan total tagihan yang tertera sudah benar, kemudian
                        pilih <b>Ya</b></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End -->

<!-- sesi Mobile -->
<div class="d-md-none d-sm-block">
    <div class="text-center cobba">
        <h4>Pesanan Berhasil    </h4>
    </div>
    <div class="container">
        <hr>
        <h5 class="text-center text-uppercase" style="font-size: 14px; letter-spacing: 1px;">terima kasih telah
            berbelanja di rainbow grosir</h5>
        <div class="card mt-4">
            <div class="card-body text-center">
                Nomor transaksi Anda adalah <b>{{$kode_pesanan}}</b> dan Anda akan menerima konfirmasi pembelian.
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body text-center">
                Mohon lakukan pembayaran sebesar IDR {{ number_format($total_pembayaran, 0, ',', '.') }} ke : Bank Mandiri a/n RAINBOW GROSIR No Rekening : <b>2208 1996 1403</b>
            </div>
        </div>
        <div class="card mt-4 mb-5">
            <div class="card-body text-center">
                <a href=""><button class="btn btn-secondary mt-3 keranjangButton text-white ">Konfirmasi Pembayaran</button></a>
                <p class="small">*Silahkan konfirmasi pesanan anda dengan mengirimkan bukti transfer pada tombol Konfirmasi Pembayaran</p>
            </div>
        </div>
    </div>
</div>
<!-- End Mobile -->

  <!-- Modal -->
  <div class="modal fade bd-example-modal-md" id="exampleModalCenter" tabindex="-1" role="dialog"
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
              <form action="{{ route('home.konfirmasi')}}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="container">
                      <div class="row">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="kode_pesanan" value="{{$kode_pesanan}}" hidden>
                                <input type="file" name="resi_pembayaran">
                            </div>
                        </div>
                      </div>
                  </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn keranjangButton text-white">Konfirmasi</button>
            </form>
          </div>
      </div>
  </div>
</div>
<!-- End Modal -->
@endsection
