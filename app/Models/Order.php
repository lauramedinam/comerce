<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'ammount',
        'shipping_address',
        'order_address',
        'order_email',
        'order_date',
        'order_status',
    ];

    // Relacion Uno a Muchos 
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // Relacion Uno a Muchos (Inversa) 
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
