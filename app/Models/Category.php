<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    protected $fillable = ['name','description'];
    public static $messages=[
        'name.required'=> 'Debes ingresar nombre de la categoría',
        'name.min'=> 'El nombre de categoría debe tener mas de 3 caracteres',
        'description.max'=> 'AH sobreepasado numero de caracteres'
     ];
    public static $rules=[//reglas de validacion
        "name"=> 'required|min:3',
        "description"=> 'max:200'
     ]; 
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
        return'/images/defaults.png';
    }
}
