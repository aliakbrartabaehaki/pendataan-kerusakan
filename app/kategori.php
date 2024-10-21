<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $primaryKey = 'kategori_id';
    protected $table = 'kategoris';
    protected $fillable =[
      'nama_kategori'
    ];


    public function barang()
    {
      return $this->hasMany('App\Barang', 'barang_id');
    }
}


