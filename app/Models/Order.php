<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resetPurchasesIfNull(){
        if($this->purchases == null)
            $this->resetPurchases();
    }

    public function resetPurchases(){
        $this->update(['purchases' => array()]);
    }

    public function setContactsAttribute($contacts){
        $this->attributes['contacts'] = json_encode($contacts);
    }
    public function getContactsAttribute($contacts){
        return json_decode($contacts, true);
    }

    public function getPurchasesAttribute($purchases){
        return $purchases = json_decode($purchases, true);
    }

    public function setPurchasesAttribute($purchases) : void{
        $this->attributes['purchases'] = json_encode($purchases);
    }

    public function getPurchasesModels() : array
    {
        return Purchase::toRelatedArray($this->purchases);
    }

    public function setPurchasesModels($purchases){
        $purchases = Purchase::toIdArray($purchases);
        $this->update(['purchases' => $purchases]);
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
        foreach ($this->getPurchasesModels() as $purchase){
            $totalCost+=$purchase->getCost();
        }
        return $totalCost;
    }

    public function getItemsNumber(){
        $itemsNumber = 0;
        foreach ($this->getPurchasesModels() as $purchase){
            $itemsNumber+=$purchase->number;
        }
        return $itemsNumber;
    }

    public function contactsToString(): string
    {

        $string = '';
        foreach ($this->contacts as $key=>$value){
            $string.=$key.':'.$value.'; ';
        }
        return $string;
    }

}
