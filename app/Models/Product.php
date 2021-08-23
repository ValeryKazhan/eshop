<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $guarded=[];

    public function rating(){//cache in the future
         $sum = 0;
         $reviews = $this->reviews;
         $number = count($reviews);

         foreach ($reviews as $review){
             $sum += $review->rating;
         }

         return $sum/$number;

    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

}
