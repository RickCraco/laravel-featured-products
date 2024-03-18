<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Category::pluck('id');

        for ($i = 0; $i < 10; $i++) {
            return [
                'name' => $this->faker->sentence(),
                'description' => $this->faker->text(),
                'image' => $this->faker->imageUrl(640, 480),
                'code_ean' => $this->faker->ean13(),
                'price' => $this->faker->randomFloat(2, 0, 1000),
                'featured' => $this->faker->boolean(),
                'category_id' => $this->faker->randomElement($categories),
                'slug' => Str::slug($this->faker->name()),
            ];
        }
    }
}
