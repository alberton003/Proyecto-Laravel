<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['product_id', 'price', 'quantity'];

    // Relación: Una venta pertenece a un producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
