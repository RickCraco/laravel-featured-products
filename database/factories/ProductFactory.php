<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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

        return [
            'name' => $name = $this->faker->name(),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(640, 480),
            'code_ean' => $this->faker->ean13(),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'featured' => $this->faker->boolean(),
            'category_id' => $this->faker->randomElement($categories),
            'slug' => Str::slug($name),
        ];
    }
}
