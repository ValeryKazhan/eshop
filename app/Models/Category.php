<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Utils;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getNameAttribute($name){
        return ucwords($name);
    }

    public function getImageAttribute($image){
        if($image&&$image!='')
            return json_decode($image, true);
        return Utils::NO_IMAGE_PATH;
    }

    public function setImageAttribute($image){
        $this->attributes['image'] = json_encode($image);
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
