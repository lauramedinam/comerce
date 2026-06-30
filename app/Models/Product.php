<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'name',
        'price',
        'weight',
        'descriptions',
        'thumbnail',
        'image',
        'category',
        'stock',
    ];

    // Relacion Uno a Muchos 
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // Relacion Muchos a Muchos 
    public function categories()
    {
        return $this->belongsToMany(Categorie::class, 'product_categories');
    }

    // Relacion Muchos a Muchos 
    public function options()
    {
        return $this->belongsToMany(Option::class, 'product_options');
    }

}
