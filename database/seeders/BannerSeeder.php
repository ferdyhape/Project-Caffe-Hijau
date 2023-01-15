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
            'attention' => 'Banner 1 Attention!',
            'fzAttention' => '35',
            'offer' => 'Banner 1 Offer',
            'fzOffer' => '40',
            'picture' => 'banner-picture/Banner1.jpg'
        ]);
        Banner::create([
            'name' => 'Banner 2',
            'attention' => 'Banner 2 Attention!',
            'fzAttention' => '35',
            'offer' => 'Banner 2 Offer',
            'fzOffer' => '40',
            'picture' => 'banner-picture/Banner2.jpg'
        ]);
        Banner::create([
            'name' => 'Banner 3',
            'attention' => 'Banner 3 Attention!',
            'fzAttention' => '35',
            'offer' => 'Banner 3 Offer',
            'fzOffer' => '40',
            'picture' => 'banner-picture/Banner3.jpg'
        ]);
    }
}
