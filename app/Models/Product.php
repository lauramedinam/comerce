<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
    protected $allowIncluded=['order_details','categories','options'];

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

    
/////////////////////////////////////////////////////////////////////////////
    public function scopeIncluded(Builder $query){
       
        if(empty($this->allowIncluded)||empty(request('included'))){
            return $query;
        }
        $relations = explode(',', request('included'));//['posts','relation2']
       
       $allowIncluded=collect($this->allowIncluded);//colocamos en una colecion lo que tiene $allowIncluded en este caso = ['posts','posts.user']
    
        foreach($relations as $key => $relationship){//recorremos el array de relaciones
            
            if(!$allowIncluded->contains($relationship)){
                unset($relations[$key]);
            }
        
        }

     return $query->with($relations);//se ejecuta el query con lo que tiene $relations en ultimas es el valor en la url de included
     
    }
///////////////////////////////////////////////////////////////////////////////////////////

public function scopeFilter(Builder $query){
    return $query;
}

}