<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skill_categories')->insert([
            [
                'title_en' => 'Web Development',
                'title_tr' => 'Web Geliştirme',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_en' => 'App Development',
                'title_tr' => 'App Geliştirme',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
