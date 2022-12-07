<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderLine extends Model
{
    use HasFactory;

    protected  $table = "order_lines";

    protected $fillable = [
        'price',
        'sku',
        'quantity'
    ];

    public function order(): BelongsTo {
        return $this->belongsTo( 'App\Models\Order', 'id_order', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo( 'App\Models\Product', 'id_product', 'id');
    }
}
