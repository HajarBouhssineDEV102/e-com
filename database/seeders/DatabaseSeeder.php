<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'phone' => '1234567890',
            'address' => '123 Admin St.',
        ]);

        // Customer
        User::create([
            'name' => 'John Doe',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'phone' => '0987654321',
            'address' => '456 Customer Ave.',
        ]);

        $tech = Category::create(['name' => 'Technology', 'description' => 'Latest gadgets']);
        $fashion = Category::create(['name' => 'Fashion', 'description' => 'Trendy clothing']);
        $home = Category::create(['name' => 'Home', 'description' => 'Home decor']);

        Product::create([
            'category_id' => $tech->id,
            'name' => 'Premium Wireless Headphones',
            'description' => 'Experience crystal clear sound with industry-leading noise cancellation technology and exceptional battery life.',
            'price' => 299.99,
            'stock' => 50,
        ]);
        
        Product::create([
            'category_id' => $tech->id,
            'name' => 'Minimalist Smartwatch',
            'description' => 'Track your fitness, control your smart home, and stay connected with elegant style designed for the modern individual.',
            'price' => 199.50,
            'stock' => 30,
        ]);

        Product::create([
            'category_id' => $fashion->id,
            'name' => 'Classic Leather Jacket',
            'description' => 'Genuine full-grain leather jacket tailored for a perfect fit. Durable and timeless piece for any wardrobe.',
            'price' => 349.00,
            'stock' => 15,
        ]);

        Product::create([
            'category_id' => $home->id,
            'name' => 'Ceramic Artisan Vase',
            'description' => 'Handcrafted ceramic vase by master artisans. Perfect for elevating the aesthetics of your living spaces.',
            'price' => 89.00,
            'stock' => 25,
        ]);
    }
}
