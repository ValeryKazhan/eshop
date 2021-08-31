<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product1 = Product::factory()->create(['description' => 'FROM ORDER FACTORY FIRST']);
        $product2 = Product::factory()->create(['description' => 'FROM ORDER FACTORY SECOND']);
        $product3 = Product::factory()->create(['description' => 'FROM ORDER FACTORY THIRD']);
        return [
            'user_id' => User::factory(),
            'purchases' => [
                new Purchase($product1->id, 4),
                new Purchase($product2->id, 5),
                new Purchase($product3->id, 6)
            ],
            'contacts' => [
                'country' => 'Vcountry',
                'region' => 'Vregion',
                'locality' => 'Vlocality',
                'street' => 'Vstreet',
                'house' => '15',
                'index' => '247000',
                'phone' => '123456789'
            ]
        ];
    }
}
