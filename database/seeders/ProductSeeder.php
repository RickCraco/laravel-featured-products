<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->category_id = Category::all()->random()->id;
            $product->name = $faker->sentence();
            $product->description = $faker->text();
            $product->image = $faker->imageUrl(640, 480);
            $product->code_ean = $faker->ean13();
            $product->price = $faker->randomFloat(2, 0, 1000);
            $product->featured = $faker->boolean();
            $product->slug = Str::slug($product->name);
            $product->save();
        }
    }
}
