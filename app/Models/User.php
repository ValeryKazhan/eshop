<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function getWishlistAttribute($wishlist){
        $wishlist = json_decode($wishlist, true);
        if($wishlist == null)
            $wishlist = $this->resetWishList();
        foreach ($wishlist as $key=>$productId) {
            $wishlist[$key] = Product::find($productId);
        }
        return $wishlist;
    }

    public function setWishlistAttribute(array $wishlist){
        foreach ($wishlist as $key=>$product){
            $wishlist[$key] = $product->id;
        }
        $this->attributes['wishlist'] = json_encode($wishlist);
    }

    public function setWishlist($wishlist){
        $this->update(['wishlist' => $wishlist]);
    }

    public function addToWishlist(Product $product){

        $isInWishlist = false;
        $wishlist = $this->wishlist;
        if(!$wishlist)
            $wishlist = array();
        foreach ($wishlist as $wishlistProduct){
            if($product->id == $wishlistProduct->id){
                $isInWishlist = true;
                break;
            }
        }
        if(!$isInWishlist){
            array_push($wishlist, $product);
            $this->update(['wishlist' => $wishlist]);
        }
        $this->setWishlist($wishlist);

    }

    public function removeFromWishlist(Product $product){
        $wishlist = $this->wishlist;
        if (($key = array_search($product, $wishlist))!==false) {
            unset($wishlist[$key]);
            $this->setWishlist($wishlist);
        }
    }

    public function resetWishList(){
        $this->update(['wishlist' => array()]);
        return array();
    }


    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function wishlist(){
        return $this->hasMany(Product::class);
    }


}
