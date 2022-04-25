<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model 
{ 
    protected $table = 'keranjang';

    protected $fillable = ['user_id', 'produk_id', 'warna', 'ukuran', 'jumlah']; 

    
    public function user(){
        return $this->belongsTo('App\User');
    }     

    public function produk(){
        return $this->belongsTo('App\Models\Produk');
    }   
}
