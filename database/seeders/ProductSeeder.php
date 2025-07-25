<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nome' => 'Notebook',
            'preco' => 3500.00,
            'quantidade' => 10
        ]);
        Product::create([
            'nome' => 'Mouse',
            'preco' => 80.50,
            'quantidade' => 50
        ]);
        Product::create([
            'nome' => 'Teclado',
            'preco' => 120.00,
            'quantidade' => 30
        ]);
    }
}
