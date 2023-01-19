<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'name' => 'Banner 1',
            'fzAttention' => '35',
            'fzOffer' => '40',
            'picture' => 'banner-picture/Banner1.jpg'
        ]);
        Banner::create([
            'name' => 'Banner 2',
            'fzAttention' => '35',
            'fzOffer' => '40',
            'picture' => 'banner-picture/Banner2.jpg'
        ]);
        Banner::create([
            'name' => 'Banner 3',
            'fzAttention' => '35',
            'fzOffer' => '40',
            'picture' => 'banner-picture/Banner3.jpg'
        ]);
    }
}
