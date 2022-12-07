<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected  $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'sku',
        'stock',
        'idCategory'
    ];

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class);
    }

    public function ordersLines(): HasMany
    {
        return $this->hasMany( 'App\Models\OrderLine', 'id', 'id_product' );
    }
}
