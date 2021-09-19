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

        return [
            'user_id' => User::factory(),
            'purchases' => array(),
//            'purchases' => Purchase::toIdArray(
//                    [
//                        new Purchase(Product::factory()->create(['description' => 'FROM ORDER FACTORY FIRST']), 4),
//                        new Purchase(Product::factory()->create(['description' => 'FROM ORDER FACTORY SECOND']), 5),
//                        new Purchase(Product::factory()->create(['description' => 'FROM ORDER FACTORY THIRD']), 6)
//                    ]
//                )
//            ,
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
