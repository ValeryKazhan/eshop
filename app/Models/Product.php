<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    public function getSpecificationAttribute($specification)
    {
       //dd($specification);
        if (!$specification){
            $specification = $this->resetSpecification();
            return $specification;
        }
        return json_decode($specification, true);
    }

    public function setSpecificationAttribute($specification): void
    {
        $this->attributes['specification'] = json_encode($specification);
    }

    public function setSpecification($specification): void
    {
        $this->update(['specification' => $specification]);
    }

    public function addSpecification(string $key, string $value): bool
    {
        if (!$this->specification)
            $this->resetSpecification();

        $specification = $this->specification;
        if (($keyExists = !key_exists($key, $specification))) {
            $specification[$key] = $value;
            $this->setSpecification($specification);
        }
        return $keyExists;
    }

    public function removeSpecification($key) : void{
        $specification = $this->specification;
        unset($specification[$key]);
        $this->setSpecification($specification);
    }

    public function resetSpecification(): array
    {
        $this->setSpecification(array());
        return array();
    }

    public function scopeFilter($query)
    {
        if (request('search')) {
            $query
                ->where('name', 'like', $search = ('%' . request('search') . '%'));
            //->orWhere('description', 'like', $search);
        }
    }

    public static function bestSold(int $take = null)
    {

        $sortBy = 'sold';
        $orders = Order::all();//can be modified by created at to take orders from certain time, this method also needs cache
        $products = array();

        foreach (Product::all() as $product) {
            $products[$product->id] = [
                'product' => $product,
                'sold' => 0
            ];
        }

        foreach ($orders as $order) {
            foreach ($order->purchases as $purchase) {
                $products[$purchase->product->id]['sold'] += $purchase->number;
            }
        }

        usort($products, function ($item1, $item2) use ($sortBy) {
            if ($item1[$sortBy] == $item2[$sortBy]) return 0;
            return $item1[$sortBy] > $item2[$sortBy] ? -1 : 1;

        });

        if ($take) {
            $products = array_slice($products, 0, $take);
        }

        foreach ($products as $key => $product) {
            $products[$key] = $product['product'];
        }

        return $products;
    }


    public function rating()
    {//cache in the future
        $sum = 0;
        $reviews = $this->reviews;
        $number = count($reviews);

        foreach ($reviews as $review) {
            $sum += $review->rating;
        }

        return $sum / $number;

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
