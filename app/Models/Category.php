<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getNameAttribute($name){
        return ucwords($name);
    }

    public function scopeFilter($query){
        if(request('search')){
            $query
                ->where('name', 'like', ('%'.request('search').'%'));
        }
    }


    public function products(){
        return $this->hasMany(Product::class);
    }

}
