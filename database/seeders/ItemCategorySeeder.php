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
            'name' => 'Large',
            // make description for large size
            'description' => 'Large size is the biggest size of the item'
        ]);
        item_category::create([
            'name' => 'Medium',
            'description' => 'Medium size is the middle size of the item'
        ]);
        item_category::create([
            'name' => 'Small',
            'description' => 'Small size is the smallest size of the item'
        ]);
    }
}
