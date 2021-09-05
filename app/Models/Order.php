<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setContactsAttribute($contacts){
        $this->attributes['contacts'] = json_encode($contacts);
    }
    public function getContactsAttribute($contacts){
        return json_decode($contacts, true);
    }

    public function getPurchasesAttribute($purchases){
        $purchases = json_decode($purchases, true);
        return Purchase::toRelatedArray($purchases);
    }

    public function setPurchasesAttribute($purchases){
        $purchases = Purchase::toIdArray($purchases);
        $this->attributes['purchases'] = json_encode($purchases);
    }

    public function customer(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function belongsToAuth(): bool
    {
        return $this->customer->id == auth()->id();
    }

    public function getTotalCost(){
        $totalCost=0;
        foreach ($this->purchases as $purchase){
            $totalCost+=$purchase->getCost();
        }
        return $totalCost;
    }

    public function getItemsNumber(){
        $itemsNumber = 0;
        foreach ($this->purchases as $purchase){
            $itemsNumber+=$purchase->number;
        }
        return $itemsNumber;
    }

}
