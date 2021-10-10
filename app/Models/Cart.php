<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function Details()//relacionamos la clase Cart a la tabla CartDetail un carrito tendra muchos detalles
    {  
        return $this->hasMany(CartDetail::class);
    }
}
