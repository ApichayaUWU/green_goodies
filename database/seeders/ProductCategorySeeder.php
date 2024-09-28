<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('')
        // You can add more categories as needed
        $categories = [
            ['name' => 'Vegetable'],
            ['name' => 'Fruit'],
        ];

        // Insert categories into the product_categories table
        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
