<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = ['user_id', 'user_alamat_id', 'total_pembayaran', 'resi_pembayaran', 'status', ]; 

    public function user(){
        return $this->belongsTo('App\User'); 
    }   

    public function alamat_user(){
        return $this->belongsTo('App\Models\Alamatuser', 'user_alamat_id');
    }   

    public function pesanan_detail(){
        return $this->hasMany('App\Models\Pesanandetail');
    }

    public function pesanan_berhasil(){
        return $this->hasOne('App\Models\Pesananberhasil');
    } 
}
