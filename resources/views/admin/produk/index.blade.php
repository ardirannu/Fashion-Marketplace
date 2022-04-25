@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection

@push('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.css"/>
@endpush

@section('header')
    Produk
@endsection 
 
@section('content')
    <div class="section-body">
        @if (session('input_success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>x</span>
                </button>
                {{ session('input_success')}}
            </div>  
        </div>
        @endif
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah Data</button>
            </div>
            <div class="col-12">
                <hr>
              <div class="card">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table id="table_id" class="table table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Handtag</th>
                                <th>Ukuran</th>
                                <th>Warna</th>
                                <th>Bahan</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Jumlah Terjual</th>
                                <th>Edited By</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($produk as $no => $data)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $data->kode_produk }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->kategori }}</td>
                                <td>{{ $data->handtag }}</td>
                                <td>  
                                    @foreach($data->ukuran as $value)
                                    {{$value}},
                                    @endforeach
                                </td>
                                <td>  
                                    @foreach($data->warna as $value)
                                    {{$value}},
                                    @endforeach
                                </td>
                                <td>{{ $data->bahan }}</td>
                                <td>Rp. {{ $data->harga }}</td>
                                <td>{{ $data->stok }}</td>
                                <td>{{ $data->jumlah_terjual }}</td>
                                <td>{{ $data->edited_by }}</td>
                                <td class="text-left">
                                    <a href="{{ route('produk.edit', $data->id )}}" class="badge badge-warning">Edit</a>
                                    <a href="#" data-id="{{ $data->id }}" class="badge badge-danger swal-confirm">
                                        <form action="{{ route('produk.destroy', $data->id )}}" id="delete{{ $data->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        </form> 
                                        Hapus
                                    </a>
                                    <a href="#" data-id="{{ $data->id }}" class="badge badge-primary mt-2 modal-view-image">Gambar & Desk</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
    </div>
    </div>
@endsection

@section('modal')
    <!-- Modal Image Produk View-->
    <div class="modal fade" tabindex="-1" role="dialog" id="imageView">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Preview Gambar Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body text-center modal-data">
                
            </div>
            <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            </div>
        </div>
        </div>
    </div>
    
    {{-- Modal create data --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="createModal">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('produk.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                                   
                                  <input type="text" name="nama" class="form-control currency">
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
                                  <select name="kategori" class="form-control" id="selectKategori">
                                    <option value="" hidden>Pilih Kategori</option>
                                    <option name="kategori" value="Kaos" @if(old('kategori') == 'kaos') selected @endif>Kaos</option>
                                    <option name="kategori" value="Kemeja" @if(old('kategori') == 'kemeja') selected @endif>Kemeja</option>
                                    <option name="kategori" value="Hoodie" @if(old('kategori') == 'hoodie') selected @endif>Hoodie</option>
                                    <option name="kategori" value="Sweater" @if(old('kategori') == 'sweater') selected @endif>Sweater</option>
                                    <option name="kategori" value="Jaket" @if(old('kategori') == 'jaket') selected @endif>Jaket</option>
                                    <option name="kategori" value="Celana" @if(old('kategori') == 'celana') selected @endif>Celana</option>
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
                                    <option name="handtag" value="Rainbow" @if(old('handtag') == 'rainbow') selected @endif>Rainbow</option>
                                    <option name="handtag" value="Standpoint" @if(old('handtag') == 'standpoint') selected @endif>Standpoint</option>
                                    <option name="handtag" value="Polar" @if(old('handtag') == 'polar') selected @endif>Polar</option>
                                    <option name="handtag" value="Surfing" @if(old('handtag') == 'surfing') selected @endif>Surfing</option>
                                    <option name="handtag" value="Giselle" @if(old('handtag') == 'giselle') selected @endif>Giselle</option>
                                    <option name="handtag" value="Glasgo" @if(old('handtag') == 'glasgo') selected @endif>Glasgo</option>
                                    <option name="handtag" value="Huahin" @if(old('handtag') == 'huahin') selected @endif>Huahin</option>
                                    <option name="handtag" value="Sport&surfing" @if(old('handtag') == 'sport&surfing') selected @endif>Sport & Surfing</option>
                                    <option name="handtag" value="Ols" @if(old('handtag') == 'ols') selected @endif>OLS</option>
                                    <option name="handtag" value="Sport" @if(old('handtag') == 'sport') selected @endif>Sport</option>
                                    <option name="handtag" value="Superrich" @if(old('handtag') == 'superrich') selected @endif>Super Rich</option>
                                    <option name="handtag" value="Dendev" @if(old('handtag') == 'dendev') selected @endif>Dendev</option>
                                    <option name="handtag" value="Lemon" @if(old('handtag') == 'lemon') selected @endif>Lemon Tree</option>
                                    <option name="handtag" value="Dickis" @if(old('handtag') == 'dickis') selected @endif>Dickis, 3ND, Jackhoobs</option>
                                    <option name="handtag" value="Supersimple" @if(old('handtag') == 'supersimple') selected @endif>Super Simple</option>
                                    <option name="handtag" value="Zifanny" @if(old('handtag') == 'zifanny') selected @endif>Zifanny</option>
                                    <option name="handtag" value="Ziffan" @if(old('handtag') == 'ziffan') selected @endif>Ziffan</option>
                                    <option name="handtag" value="Volcom" @if(old('handtag') == 'volcom') selected @endif>Volcom</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Ukuran Tersedia *</label>
                                <div class="input-group" id="ukuranBaju" hidden>
                                  <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="ukuran[]" value="S" class="selectgroup-input">
                                      <span class="selectgroup-button">S</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="ukuran[]" value="M" class="selectgroup-input">
                                      <span class="selectgroup-button">M</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="ukuran[]" value="L" class="selectgroup-input">
                                      <span class="selectgroup-button">L</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="ukuran[]" value="XL" class="selectgroup-input">
                                      <span class="selectgroup-button">XL</span>
                                    </label>
                                  </div>
                                </div>

                                {{-- select option jika kategori = celana --}}
                                <div class="input-group" id="ukuranCelana" hidden> 
                                  <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="ukuran[]" value="27" class="selectgroup-input">
                                      <span class="selectgroup-button">27</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="ukuran[]" value="28" class="selectgroup-input">
                                      <span class="selectgroup-button">28</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="ukuran[]" value="29" class="selectgroup-input">
                                      <span class="selectgroup-button">29</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="ukuran[]" value="30" class="selectgroup-input">
                                      <span class="selectgroup-button">30</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="ukuran[]" value="31" class="selectgroup-input">
                                      <span class="selectgroup-button">31</span>
                                        </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="ukuran[]" value="32" class="selectgroup-input">
                                        <span class="selectgroup-button">32</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="ukuran[]" value="33" class="selectgroup-input">
                                        <span class="selectgroup-button">33</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="ukuran[]" value="34" class="selectgroup-input">
                                        <span class="selectgroup-button">34</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="ukuran[]" value="35" class="selectgroup-input">
                                        <span class="selectgroup-button">35</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="ukuran[]" value="36" class="selectgroup-input">
                                        <span class="selectgroup-button">36</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="ukuran[]" value="37" class="selectgroup-input">
                                        <span class="selectgroup-button">37</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="ukuran[]" value="38" class="selectgroup-input">
                                        <span class="selectgroup-button">38</span>
                                    </label>
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
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="warna[]" value="Putih" class="selectgroup-input">
                                      <span class="selectgroup-button">Putih</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="warna[]" value="Biru" class="selectgroup-input">
                                      <span class="selectgroup-button">Biru</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="warna[]" value="Kuning" class="selectgroup-input">
                                      <span class="selectgroup-button">Kuning</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="warna[]" value="Merah" class="selectgroup-input">
                                      <span class="selectgroup-button">Merah</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="warna[]" value="Cream" class="selectgroup-input">
                                      <span class="selectgroup-button">Cream</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="warna[]" value="Hitam" class="selectgroup-input">
                                        <span class="selectgroup-button">Hitam</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="warna[]" value="Lillac" class="selectgroup-input">
                                      <span class="selectgroup-button">Lillac</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="warna[]" value="Full Color" class="selectgroup-input">
                                      <span class="selectgroup-button">Full Color</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="warna[]" value="Loreng" class="selectgroup-input">
                                      <span class="selectgroup-button">Loreng</span>
                                    </label>
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
                                <option name="bahan" value="Cotton" @if(old('bahan') == 'cotton') selected @endif>Cotton</option>
                                <option name="bahan" value="Cotton Combed" @if(old('bahan') == 'cotton_combed') selected @endif>Cotton Combed</option>
                                <option name="bahan" value="Cotton Mistik" @if(old('bahan') == 'cotton_mistik') selected @endif>Cotton Mistik</option>
                                <option name="bahan" value="Delson" @if(old('bahan') == 'delson') selected @endif>Delson</option>
                                <option name="bahan" value="Flanel" @if(old('bahan') == 'flanel') selected @endif>Flanel</option>
                                <option name="bahan" value="Babyteri" @if(old('bahan') == 'babyteri') selected @endif>Babyteri</option>
                                <option name="bahan" value="Premium" @if(old('bahan') == 'premium') selected @endif>Premium</option>
                                <option name="bahan" value="Jeans" @if(old('bahan') == 'jeans') selected @endif>Jeans</option>
                                <option name="bahan" value="Chinos" @if(old('bahan') == 'chinos') selected @endif>Chinos</option>
                              </select>
                            </div>
                        </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Deskripsi * @error('deskripsi') <b @error('deskripsi') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <textarea name="deskripsi" class="summernote-simple" style="margin-top: 0px; margin-bottom: 0px; height: 50px; width: 100%;"></textarea>
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
                                  <input type="number" name="harga" class="form-control currency">
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
                                  <input type="number" name="stok" class="form-control currency">
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
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-scripts')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'pdf', 'excel', 'print'
            ]
        } );
        } );
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.js"></script>

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


        // alert konfirmasi hapus data
        $(".swal-confirm").click(function(e){
            id = e.target.dataset.id;
            swal({
                title: "Anda yakin ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Data berhasil dihapus!", {
                    icon: "success",
                    });
                    $(`#delete${id}`).submit();
                } else {

                }
            })
        });

        $(".swal-update-status").click(function(e){
            id = e.target.dataset.id;
            swal({
                title: "Tetapkan sebagai produk Terjual ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Produk ditetapkan Terjual!", {
                    icon: "success",
                    });
                    $(`#update-status${id}`).submit();
                } else {

                }
            })
        });

        @if($errors->any())
            $('#createModal').modal('show')
        @endif

    </script>

    <script >
        $(document).ready(function() {
        $('.modal-view-image').on('click', function(){
            let id = $(this).data('id')
            $.ajax({
                url:`produk/modal/${id}`,
                method:"GET",
                success: function(data){
                    $('#imageView').find('.modal-data').html(data)
                    $('#imageView').modal('show')
                },
                error: function(error){
                    console.log(error)
                }
            })
        })
    });
    </script> 
    

@endpush
 