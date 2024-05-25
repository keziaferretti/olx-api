<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];


    // uma categoria tem muitos categorias
    public function Advertises(){
        return $this->hasMany(Advertise::class);
    }
}
