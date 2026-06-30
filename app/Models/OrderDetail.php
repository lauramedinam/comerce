<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    //Relacion Uno a Muchos (Inversa) 
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //Relacion Uno a Muchos (Inversa) 
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
