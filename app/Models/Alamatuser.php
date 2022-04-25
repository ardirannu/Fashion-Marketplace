<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamatuser extends Model
{
    protected $table = 'users_alamat';

    protected $fillable = ['users_id', 'nama_jalan', 'provinsi', 'kota', 'kode_pos']; 

    public function user(){
        return $this->belongsTo('App\User');
    }   

    public function pesanan(){
        return $this->hasMany('App\Models\Pesanan');
    }   
}
