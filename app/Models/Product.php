<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'slug', 'description', 'image', 'code_ean', 'price', 'featured'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
