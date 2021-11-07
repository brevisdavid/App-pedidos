<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class CartDetail extends Model
{
    public function product()
    {
      return $this->belongsTo(Product::class);
    }  
   
}
