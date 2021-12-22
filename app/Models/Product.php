<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 
        'name',
        'description',
        'long_description',
        'price',
        'stock',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    public function getFeaturedImageUrlAttribute(){
        $featuredImage=$this->images()->where('featured',true)->first();
        if (!$featuredImage) 
            $featuredImage=$this->images()->first();
        
        if ($featuredImage) {
            return $featuredImage->url;
        }
        return'/images/defaults.png';
      }
      public function getCategoryNameAttribute()
      {
        if ($this->category) 
            return $this->category->name;
        
            return'General';
      }
     /*  public function add_stock($cantidad)
      {
          $this->increment('stock',$cantidad);
      }
      public function des_stock($cantidad)
      {
        $this->decrement('stock',$cantidad);
      } */
     
}
