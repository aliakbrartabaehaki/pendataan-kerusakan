<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $primaryKey = 'barang_id';
    protected $table = 'barangs';
    protected $fillable = [
        'nama_barang',
        'deskripsi',
        'kategori_id',
        'nama',
        'lokasi',
        'tanggal_kerusakan',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }

    public function kerusakans()
    {
        return $this->hasMany(Kerusakan::class, 'barang_id');
    }

    public function perbaikan()
    {
        return $this->hasMany(Perbaikan::class, 'barang_id');
    }
}
