<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_en',
        'text',
        'text_en',
        'slug',
        'slug_en'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($collection) {
            $collection->slug = Str::slug($collection->name);
        });
    }

    public function products() {
        return $this->hasMany(Product::class, 'collection_id', 'id')->get();
    }

}
