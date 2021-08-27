<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class BucketController extends Controller
{
    public function addPurchase()
    {
        $purchaseExists=false;
        $id = request('product_id');
        $number = request('number');
        $purchases = session()->get('bucket');
        $purchases == null ? $purchases = array() : '';

        if(!$purchases){
            $purchases = array();
            array_push($purchases, new Purchase($id, $number));
        } else {

            foreach ($purchases as $purchase){
                if ($purchase->product->id == $id){
                    $purchase->add($number);
                    $purchaseExists=true;
                }
                if($purchaseExists)
                    break;
            }
            !$purchaseExists ? array_push($purchases, new Purchase($id, $number)) : null;
        }


        session()->put('bucket', $purchases);
        return back();
    }
}
