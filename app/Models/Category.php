<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    protected $fillable = ['name','description'];
    
    public function products(){
        return $this->hasMany(Product::class);
    }
    
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->image) {
            return'/images/categories/'.$this->image;
        }
        else
        $firstProduct=$this->products()->first();
        if ($firstProduct) {
            return $firstProduct->featured_image_url;
        }
        /* $featuredProduct=$this->products()->first();
        return $featuredProduct->featured_image_url; */
        return'/images/defauls.png';
    }
}
