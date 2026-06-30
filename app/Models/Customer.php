<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    // Relacion Uno a Muchos 
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
