<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
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
            'purchases' => json_encode([
                Product::factory()->create(['description' => 'FROM ORDER FACTORY FIRST'])->id => 4,
                Product::factory()->create(['description' => 'FROM ORDER FACTORY SECOND'])->id => 5,
                Product::factory()->create(['description' => 'FROM ORDER FACTORY THIRD'])->id => 6
            ])
        ];
    }
}
