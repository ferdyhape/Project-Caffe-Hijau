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
            'name' => 'Anniversary Brownies',
            'price' => 175000,
            'category_id' => 2,
            'description' => "Enim eu irure quis ad ipsum. Esse pariatur consectetur nisi commodo quis veniam commodo. Ipsum magna eiusmod ipsum non aliqua incididunt occaecat magna sit.",
            'picture' => 'item-picture/dummy-image.png'
        ]);
        item::create([
            'name' => 'Brownies Semhas',
            'price' => 175000,
            'category_id' => 2,
            'description' => "Enim eu irure quis ad ipsum. Esse pariatur consectetur nisi commodo quis veniam commodo. Ipsum magna eiusmod ipsum non aliqua incididunt occaecat magna sit.",
            'picture' => 'item-picture/dummy-image.png'
        ]);
        item::create([
            'name' => 'Crumble Brownies',
            'price' => 175000,
            'category_id' => 2,
            'description' => "Enim eu irure quis ad ipsum. Esse pariatur consectetur nisi commodo quis veniam commodo. Ipsum magna eiusmod ipsum non aliqua incididunt occaecat magna sit.",
            'picture' => 'item-picture/dummy-image.png'
        ]);
        item::create([
            'name' => 'Crumble Original Brownies',
            'price' => 175000,
            'category_id' => 1,
            'description' => "Enim eu irure quis ad ipsum. Esse pariatur consectetur nisi commodo quis veniam commodo. Ipsum magna eiusmod ipsum non aliqua incididunt occaecat magna sit.",
            'picture' => 'item-picture/dummy-image.png'
        ]);
        item::create([
            'name' => 'Custom Brownies',
            'price' => 175000,
            'category_id' => 2,
            'description' => "Enim eu irure quis ad ipsum. Esse pariatur consectetur nisi commodo quis veniam commodo. Ipsum magna eiusmod ipsum non aliqua incididunt occaecat magna sit.",
            'picture' => 'item-picture/dummy-image.png'
        ]);
        item::create([
            'name' => "Mother Day's Brownies",
            'price' => 175000,
            'category_id' => 3,
            'description' => "Enim eu irure quis ad ipsum. Esse pariatur consectetur nisi commodo quis veniam commodo. Ipsum magna eiusmod ipsum non aliqua incididunt occaecat magna sit.",
            'picture' => 'item-picture/dummy-image.png'
        ]);
        item::create([
            'name' => "Mother Day's 2 Brownies",
            'price' => 175000,
            'category_id' => 2,
            'description' => "Enim eu irure quis ad ipsum. Esse pariatur consectetur nisi commodo quis veniam commodo. Ipsum magna eiusmod ipsum non aliqua incididunt occaecat magna sit.",
            'picture' => 'item-picture/dummy-image.png'
        ]);
        item::create([
            'name' => "Mother Day's 3 Brownies",
            'price' => 175000,
            'category_id' => 2,
            'description' => "Enim eu irure quis ad ipsum. Esse pariatur consectetur nisi commodo quis veniam commodo. Ipsum magna eiusmod ipsum non aliqua incididunt occaecat magna sit.",
            'picture' => 'item-picture/dummy-image.png'
        ]);
        item::create([
            'name' => "Mother Day's 4 Brownies",
            'price' => 175000,
            'category_id' => 2,
            'description' => "Enim eu irure quis ad ipsum. Esse pariatur consectetur nisi commodo quis veniam commodo. Ipsum magna eiusmod ipsum non aliqua incididunt occaecat magna sit.",
            'picture' => 'item-picture/dummy-image.png'
        ]);
        item::create([
            'name' => "Packaging Style 1",
            'price' => 175000,
            'category_id' => 2,
            'description' => "Enim eu irure quis ad ipsum. Esse pariatur consectetur nisi commodo quis veniam commodo. Ipsum magna eiusmod ipsum non aliqua incididunt occaecat magna sit.",
            'picture' => 'item-picture/dummy-image.png'
        ]);
        item::create([
            'name' => "Packaging Style 2",
            'price' => 175000,
            'category_id' => 2,
            'description' => "Enim eu irure quis ad ipsum. Esse pariatur consectetur nisi commodo quis veniam commodo. Ipsum magna eiusmod ipsum non aliqua incididunt occaecat magna sit.",
            'picture' => 'item-picture/dummy-image.png'
        ]);
    }
}
