<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::truncate();
        Plan::create([
            'type'=>'free',
            'title'=>'Free Plan',
            'description'=>'lets learn different skills from talented peoples',
            'monthly_swaps'=>3,
            'show_ads'=>true,
            'priority_support'=>false,
            'retry_exam_duration'=>72
        ]);
        Plan::create([
            'type'=>'paid',
            'title'=>'Premium Plan',
            'monthly_price_id'=>'pri_01hhy5hjc8qnz4r3epjhfqhbkk',
            'monthly_price'=>'5',
            'description'=>'Get started on our Premium Plan for just $6 a month and experience a transformative learning journey like never before!',
            'monthly_swaps'=>10,
            'show_ads'=>false,
            'priority_support'=>true,
            'retry_exam_duration'=>24
        ]);
    }
}
