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
    public function getTotalAttribute()
    {
        $total=0;
        foreach ($this->details as $detail){
            $total+=$detail->cantidad*$detail->product->price;
        } 
        return $total;
        
    }
     public function getStockAttribute()

    {   
        $stock=0;
        foreach($this->details as $detail){
            $stock-=$detail->stock-$detail->cantidad;
        }
        return $stock;
    } 
    public function getCantidttribute()

    {   
        $cantid=0;
        foreach($this->details as $detail){
            $cantid=$detail->cantidad-$detail->product->stock;
        }
        return $cantid;
    } 
}
