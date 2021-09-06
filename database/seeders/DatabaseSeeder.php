<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Order::factory(4)->create();
        Product::factory(8)->create(['category_id' => 1]);
        Product::factory(10)->create(['category_id' => 2]);



        foreach(Product::all() as $product){
            Review::factory(3)->create(['product_id' => $product->id]);
            Comment::factory(4)->create(['product_id' => $product->id]);
        }

        $johndoe = User::create(
            ['name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'johndoe@mail.ru',
            'password' => 'password' // password
            ]
        );

        $admin = User::create(
            ['name' => 'Valery Kazhan',
                'username' => 'valerykazhan',
                'email' => 'wolera1@mail.ru',
                'is_admin' => true,
                'password' => 'password' // password
            ]);
    }
}
