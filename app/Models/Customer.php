<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'full_name',
        'billing_address',
        'default_shipping_address',
        'country',
        'phone',
    ];

    protected $allowIncluded = ['orders'];
    // Relacion Uno a Muchos 
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
////////////////////////////////////////////////////////////////////////////
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
