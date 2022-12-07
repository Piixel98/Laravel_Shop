<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected  $table = "categories";

    protected $fillable = [
        'id',
        'name',
        'photo',
        'isParent',
        'parentId',
        'status',
        'description'
    ];

    public function parentInfo(): HasOne
    {
        return $this->hasOne('App\Models\Category','id','parentId');
    }

    public function products(): Collection
    {
        return $this->belongsToMany(Product::class)->get();
    }
}

