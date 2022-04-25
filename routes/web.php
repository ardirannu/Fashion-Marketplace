<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');


//route auth user   
Auth::routes(['verify' => true ]);
Route::get('/pelanggan', 'PelangganController@index')->name('pelanggan')->middleware('verified');

//route auth admin
Route::prefix('admin')->group(function () {    
    //login routes
    Route::get('/login', 'AuthAdmin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\AdminLoginController@login')->name('admin.login.submit');

    //logout route
    Route::post('/logout', 'AuthAdmin\AdminLoginController@logout')->name('admin.logout');
});

    //route group admin
    Route::get('admin/dashboard', 'DashboardController@index')->name('dashboard.index'); 
    Route::resource('admin/produk', 'ProdukController');
    Route::get('admin/produk/modal/{id}', 'ProdukController@image_view')->name('preview.index'); 
    Route::resource('admin/pelanggan/pelanggan', 'UserController');
    Route::resource('admin/pelanggan/alamat_pelanggan', 'AlamatuserController');
    Route::resource('admin/keranjang', 'KeranjangController');
    Route::resource('admin/pesanan/pesanan', 'PesananController');
    Route::get('admin/pesanan/pesanan/modal/{id}', 'PesananController@resi_view')->name('pesanan.resi'); 
    Route::post('admin/pesanan/pesanan/update_status/{id}', 'PesananController@update_status')->name('pesanan.update_status'); 
    Route::resource('admin/pesanan/pesanan_detail', 'PesanandetailController');
    Route::resource('admin/pesanan/pesanan_berhasil', 'PesananberhasilController');
    Route::post('admin/pesanan/pesanan_berhasil/invoice/{id}', 'PesananberhasilController@invoice')->name('pesanan_berhasil.invoice'); 
    Route::resource('admin/toko', 'TokoController');
    Route::resource('admin/banner', 'BannerController');
    Route::resource('admin/instagram', 'InstagramController');
    Route::resource('admin/role', 'RoleController');
    Route::resource('admin/user', 'AdminController'); 
//end route group admin

  
    //route home
    Route::get('/', 'home\HomeController@index')->name('home.index'); 
    Route::get('produk/detail/{handtag}/{id}/{slug}', 'home\DetailController@index')->name('home.produk.detail'); 
    Route::get('produk/kategori/kaos', 'home\KategoriController@kaos')->name('home.produk.kategori.kaos'); 
    Route::get('produk/kategori/kemeja', 'home\KategoriController@kemeja')->name('home.produk.kategori.kemeja'); 
    Route::get('produk/kategori/hoodie', 'home\KategoriController@hoodie')->name('home.produk.kategori.hoodie'); 
    Route::get('produk/kategori/sweater', 'home\KategoriController@sweater')->name('home.produk.kategori.sweater'); 
    Route::get('produk/kategori/jaket', 'home\KategoriController@jaket')->name('home.produk.kategori.jaket'); 
    Route::get('produk/kategori/celana', 'home\KategoriController@celana')->name('home.produk.kategori.celana');
    Route::get('produk/kategori/{paramSearch}/cari', 'home\KategoriController@search')->name('home.produk.kategori.search');
    Route::get('keranjang', 'home\KeranjangController@index')->name('home.keranjang')->middleware('verified'); 
    Route::post('keranjang', 'home\KeranjangController@tambah')->name('home.keranjang.tambah')->middleware('verified'); 
    Route::delete('keranjang/{id}/hapus', 'home\KeranjangController@hapus')->name('home.keranjang.hapus')->middleware('verified'); 
    Route::get('checkout', 'home\PesananController@index')->name('home.checkout'); 
    Route::post('checkout', 'home\PesananController@checkout')->name('home.checkout')->middleware('verified');  
    Route::get('pesanan_berhasil', 'home\PesananberhasilController@index')->name('home.pesanan_berhasil')->middleware('verified'); 
    Route::post('konfirmasi_pesanan', 'home\PesananController@konfirmasi')->name('home.konfirmasi')->middleware('verified');  
    Route::get('akun', 'home\AkunController@index')->name('home.akun')->middleware('verified'); 
    Route::post('akun/konfirmasi', 'home\AkunController@konfirmasi')->name('home.akun.pesanan_konfirmasi')->middleware('verified');  
    Route::post('akun/ubah_alamat', 'home\AkunController@ubah_alamat')->name('home.akun.ubah_alamat')->middleware('verified');  
    Route::post('akun/tambah_alamat', 'home\AkunController@tambah_alamat')->name('home.akun.tambah_alamat')->middleware('verified');  

 
    //end route home

 