<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_order',
        'user_id',
        'jenis_produk',
        'model_produk',
        'spesifikasi_produk',
        'dimensi_produk',
        'bahan_produk',
        'gambarsampel_produk',
        'harga_akhir',
        'status',
    ];
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_order', 'id');
    }    
    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }    
}
