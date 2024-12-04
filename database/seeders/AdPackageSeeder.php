<?php

namespace Database\Seeders;

use App\Models\AdPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages=[
            [
                'type'=>'notification',
                'title'=>'One Time Notification',
                'price'=>20,
                'price_id'=>'pri_01hsbp0ka6hgtwysz0e156sc46',
                'duration'=>1,
                'description'=>'Send notfication to users with just one click and get leads for your business'
            ],
            [
                'type'=>'header',
                'title'=>'Show Ad in Header',
                'price'=>10,
                'price_id'=>'pri_01hsbp48zfzvtwvqkbqs9amew9',
                'duration'=>30,
                'description'=>'Your ad will be displayed on header of the website.'
            ],
            [
                'type'=>'footer',
                'title'=>'Show Ad in footer',
                'price'=>5,
                'price_id'=>'pri_01hsbp48zfzvtwvqkbqs9amew9',
                'duration'=>30,
                'description'=>'Your ad will be displayed on footer of the website'
            ],
            [
                'type'=>'skills-page',
                'title'=>'Show ad In User skill listing page',
                'price'=>20,
                'price_id'=>'pri_01hsbp61wyt7sj34y785mtpyy0',
                'duration'=>30,
                'description'=>'get more leads by displaying your ad in user skills listing page'
            ]
        ];

        foreach($packages as $package){
            AdPackage::create($package);
        }
    }
}
