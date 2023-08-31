<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $parent1 = Category::create(['name' => 'Electronics']);
         $parent2 = Category::create(['name' => 'Clothing']);
         $parent3 = Category::create(['name' => 'Home']);
 
         $child1 = $parent1->children()->create(['name' => 'Laptops']);
         $child2 = $parent1->children()->create(['name' => 'Smartphones']);
 
    
         $child3 = $parent2->children()->create(['name' => 'Men']);
         $child4 = $parent2->children()->create(['name' => 'Women']);
 
         $this->command->info('Categories table seeded successfully.');
    }
}
