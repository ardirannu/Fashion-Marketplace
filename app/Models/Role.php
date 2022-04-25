<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $fillable = ['nama', ]; 

    public function admin(){
        return $this->hasMany('App\Admin');
    }    
}
