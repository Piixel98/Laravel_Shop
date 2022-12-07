<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected  $table = "orders";

    protected $fillable = [
        'totalAmount',
        'paymentMethod',
        'paymentStatus',
        'firstName',
        'lastName',
        'email',
        'phone',
        'city',
        'country',
        'postalCode',
        'address'
    ];

    public function ordersLines(): HasMany
    {
        return $this->hasMany( 'App\Models\OrderLine', 'id_order', 'id' );
    }
}
