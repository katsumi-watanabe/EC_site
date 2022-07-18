<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            # fakerを使用することでランダムなダミーデータを作成できる
            'genre_id' => Genre::all()->random()->id,
            'name' => $this->faker->realText(rand(10,20)),
            'description' => $this->faker->realText(rand(25,30)),
            'price' => $this->faker->randomNumber(4),
            'image_1' => $this->faker->image(storage_path('app/public/images'),400,300, null, false),
            'image_2' => $this->faker->image(storage_path('app/public/images'),400,300, null, false),
            'image_3' => $this->faker->image(storage_path('app/public/images'),400,300, null, false),
            'image_4' => $this->faker->image(storage_path('app/public/images'),400,300, null, false),
            'sales_status' => $this->faker->boolean(90),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
