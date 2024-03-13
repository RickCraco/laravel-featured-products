<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $open = fopen('database/csv/categories.csv', 'r');

        $data = fgetcsv($open, 1000, ",");

        while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
            $newCategory = new Category();
            $newCategory->name = $data[0];
            $newCategory->color = $data[1];
            $newCategory->slug = Str::slug($data[0], '-');
            $newCategory->save();
        }

        fclose($open);
    }
}
