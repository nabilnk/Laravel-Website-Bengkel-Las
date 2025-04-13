<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_image',
        'product_description',
    ];

    public function model_product()
    {
        return $this->hasMany(ModelProduct::class);
    }
    public function product()
    {
        return $this->hasMany(ProductDetail::class);
    }
}
