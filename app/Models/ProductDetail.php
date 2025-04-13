<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'product_details';
    public function modelproduct()
    {
        return $this->belongsTo(ModelProduct::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
