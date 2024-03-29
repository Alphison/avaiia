<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_en',
        'description',
        'description_en',
        'price',
        'article',
        'color',
        'color_en',
        'preview_image',
        'collection_id',
        'count',
        'status_id',
        'care',
        'care_en',
        'slug'
    ];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function status()
    {
        return $this->belongsTo(ProductStatus::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function getPreviewUrlAttribute()
    {
        return Storage::url($this->preview_image);
    }
}
