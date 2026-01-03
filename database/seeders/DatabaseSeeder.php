<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create categories
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Electronic devices and gadgets',
                'slug' => 'electronics'
            ],
            [
                'name' => 'Clothing',
                'description' => 'Apparel and fashion items',
                'slug' => 'clothing'
            ],
            [
                'name' => 'Books',
                'description' => 'Books and reading materials',
                'slug' => 'books'
            ],
            [
                'name' => 'Home & Garden',
                'description' => 'Home and garden products',
                'slug' => 'home-garden'
            ]
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create($categoryData);

            // Create 5 products for each category
            for ($i = 1; $i <= 5; $i++) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => $categoryData['name'] . ' Product ' . $i,
                    'slug' => Str::slug($categoryData['name'] . ' Product ' . $i),
                    'description' => 'This is a sample product in the ' . $categoryData['name'] . ' category. High quality and great value for money.',
                    'price' => rand(10, 500),
                    'stock' => rand(0, 100),
                    'is_active' => true
                ]);
            }
        }
    }
}

