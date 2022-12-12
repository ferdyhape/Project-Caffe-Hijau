<?php

namespace Database\Seeders;

use App\Models\item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        item::create([
            'name' => 'Americano',
            'price' => 10000,
            'category_id' => 1,
            'description' => "This is descsription",
            'picture' => 'coffe.jpg'
        ]);
        item::create([
            'name' => 'Torabicca',
            'price' => 12500,
            'category_id' => 1,
            'description' => "This is descsription",
            'picture' => 'coffe.jpg'
        ]);
        item::create([
            'name' => 'Latte',
            'price' => 14999,
            'category_id' => 1,
            'description' => "This is descsription",
            'picture' => 'coffe.jpg'
        ]);
        item::create([
            'name' => 'Tarik Tea',
            'price' => 8000,
            'category_id' => 2,
            'description' => "This is descsription",
            'picture' => 'tea.jpg'
        ]);
        item::create([
            'name' => 'Lemon Tea',
            'price' => 70000,
            'category_id' => 2,
            'description' => "This is descsription",
            'picture' => 'tea.jpg'
        ]);
    }
}
