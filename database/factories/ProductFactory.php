<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'slug' => $this->faker->unique()->slug,
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph(5),
            'price' => $this->faker->numberBetween(100, 1000)
        ];
    }
}
