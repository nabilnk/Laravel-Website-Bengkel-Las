<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelProduct extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function product_detail()
    {
        return $this->hasOne(ProductDetail::class, 'modelproduct_id');
    }
}
