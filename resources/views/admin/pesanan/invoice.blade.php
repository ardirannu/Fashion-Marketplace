<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $toko->nama_toko }} | {{ $pesanan_berhasil->kode_invoice}}</title>

    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 12px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(4) {
        text-align: right;
    }

    .invoice-box table tr td:nth-child(5) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 28px;
        line-height: 45px;
        color: rgb(255, 97, 97);
    }

    .invoice-box table tr.information table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }


    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }

    .total-pembayaran{
        text-align: right;
        font-size: 14px;
    }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                {{ $toko->nama_toko}}
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                ID Invoice : {{ $pesanan_berhasil->kode_invoice}}<br>
                                ID Pesanan : {{ $pesanan_berhasil->pesanan->kode_pesanan}}<br>
                                Tanggal : {{ $tanggal}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td style="width: 200px">Dari<br>
                                <b>{{ $toko->nama_toko}}</b><br>
                                {{ $toko->alamat}}
                            </td>
                            <td></td>
                            <td></td>
                            <td>Tujuan<br>
                                <b>{{ $pesanan->user->name}}</b><br>
                                {{ $pesanan->alamat_user->nama_jalan}}  {{ $pesanan->alamat_user->kota}}  {{ $pesanan->alamat_user->provinsi}}  {{ $pesanan->alamat_user->kode_pos}}<br>
                                {{ $pesanan->user->email}}
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
        </div>
        </table>

        <table>
            <tr class="heading">
                <td>
                    Produk
                </td>
                <td>
                    Kode Produk
                </td>
                <td>
                    QTY
                </td>
                <td>
                    Harga Produk
                </td>
                <td>
                    Sub Total
                </td>
            </tr>

            @foreach ($pesanan_detail as $data)
            <tr class="item">
                <td>
                    {{ $data->produk->nama }}
                </td>
                <td>
                    {{ $data->produk->kode_produk }}
                </td>
                <td>
                    {{ $data->jumlah }}
                </td>
                <td>
                    Rp. {{ $data->produk->harga }}
                </td>
                <td>
                    @php
                        $jumlah =  $data->jumlah;
                        $harga_produk = $data->produk->harga;
                        $subtotal = $jumlah * $harga_produk;
                    @endphp
                    Rp. {{ $subtotal }}
                </td>
            </tr>
            @endforeach

            <tr class="total heading">
                <td colspan="4" class="total-pembayaran">Total Pembayaran :</td>
                <td class="total-pembayaran">
                   Rp. {{ $pesanan_berhasil->pesanan->total_pembayaran}}
                </td>
            </tr>
        </table>
        <h4 style="text-align: center">...Terimakasih atas kepercayaan anda belanja di Rainbow...</h4>
</body>
</html>