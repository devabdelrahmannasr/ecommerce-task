<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();

         $categoryIds = Category::pluck('id')->all();
 
         foreach (range(1, 50) as $index) {
             Product::create([
                 'name' => $faker->unique()->word,
                 'description' => $faker->paragraph,
                 'price' => $faker->randomFloat(2, 10, 1000),
                 'quantity' => $faker->numberBetween(1, 100),
                 'sku' => $faker->unique()->ean8,
                 'barcode' => $faker->unique()->ean13,
                 'is_featured' => $faker->boolean,
                 'is_active' => $faker->boolean,
                 'category_id' => $faker->randomElement($categoryIds),
             ]);
         }
 
         $this->command->info('Products table seeded successfully.');
    }
}
