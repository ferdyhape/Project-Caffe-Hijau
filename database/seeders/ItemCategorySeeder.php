<?php

namespace Database\Seeders;

use App\Models\item_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        item_category::create([
            'name' => 'Coffe',
        ]);
        item_category::create([
            'name' => 'Tea',
        ]);
        item_category::create([
            'name' => 'Angkringannese',
        ]);
    }
}
