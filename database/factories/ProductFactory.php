<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = $this->faker->unique()->word;
        return [

            'category_id' => Category::factory(),
            'slug' => Str::slug($name),
            'name' => $name,
            'description' => $this->faker->paragraph(5),
            'price' => $this->faker->numberBetween(100, 1000)
        ];
    }
}
