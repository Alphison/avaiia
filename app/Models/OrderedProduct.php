<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'products_id',
        'size_id',
        'count'
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product () {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function size() {
        return $this->belongsTo(ProductSize::class);
    }
}
