<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;
  protected $fillable = ['name', 'slug'];

  //colocar es slug en la url para hacerla ceo frendly

  public function getRouteKeyName()
  {
    return "slug";
  }

  //Relacion uno a mucho de la base de datos

  public function posts()
  {
    return $this->hasMany(Post::class());
  }
}
