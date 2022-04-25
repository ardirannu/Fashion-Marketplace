<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Produk extends Model
{
    use Sluggable;
    protected $table = 'produk';

    protected $fillable = ['kode_produk', 'nama', 'handtag', 'kategori', 'ukuran', 'warna', 'bahan', 'deskripsi',
     'harga', 'jumlah_terjual', 'stok', 'gambar_produk', 'gambar_produk_2', 'gambar_produk_3', 'gambar_produk_4', 'edited_by'];

    public function setUkuranAttribute($value)
    {
        $this->attributes['ukuran'] = json_encode($value);
    }
 
    public function getUkuranAttribute($value)
    {
        return $this->attributes['ukuran'] = json_decode($value);
    }
    public function setWarnaAttribute($value)
    {
        $this->attributes['warna'] = json_encode($value);
    }
 
    public function getWarnaAttribute($value)
    {
        return $this->attributes['warna'] = json_decode($value);
    }

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function keranjang(){
        return $this->hasMany('App\Models\Keranjang'); 
    }   

    public function pesanan_detail(){
        return $this->hasMany('App\Models\Pesanandetail');
    }   
}
