<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    protected $primaryKey = 'perbaikan_id';
    protected $table = 'perbaikans';
    protected $fillable = [
        'barang_id',
        'catatan',
        'tanggal_perbaikan',
        'keterangan',
    ];
    

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    
    
}