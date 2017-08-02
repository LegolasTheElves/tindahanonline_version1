<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;
    protected $fillable = ['imagePath', 'title', 'description', 'price', 'category_id'];
    
    public function orders(){
        return $this->hasMany('App\Order');
    }
    public function categories(){
        return $this->hasMany('App\Category');
    }
}
