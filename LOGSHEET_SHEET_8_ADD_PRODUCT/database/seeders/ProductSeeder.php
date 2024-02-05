<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // generate 10 products

        Product::create([
            'chief_id' => 10, // Replace with the actual user ID
            'food_name' => 'Sample Food',
            'food_image' => 'sample.jpg',
            'food_descriptions' => 'Description of the sample food',
            'ingredients' => 'Ingredient 1, Ingredient 2',
            'is_available' => true,
            'category_tag' => 'Sample Category',
            'quantity_available' => 10,
            'food_price' => 9.99,
        ]);
    }
}
