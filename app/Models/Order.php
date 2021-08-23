<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getPurchasesAttribute($purchases){
        $purchases = json_decode($purchases, true);
        $idArray = array_keys($purchases);
        $purchases = array_values($purchases);


        for($i=0; $i<count($idArray); $i++){
            $purchases[$i] = new Purchase($idArray[$i], $purchases[$i]);
        }
        return $purchases;
    }

    public function setPurchasesAttribute($purchases){
        $this->attributes['purchases'] = json_encode($purchases);
    }

    public function customer(){
        return $this->belongsTo(User::class);
    }

}
