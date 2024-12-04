<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            [
                'category_id' => 1,  // Assuming category_id 1 exists
                'title_en' => 'Web Development',
                'title_tr' => 'Web Geliştirme',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,  // Assuming category_id 1 exists
                'title_en' => 'Mobile Development',
                'title_tr' => 'Mobil Geliştirme',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,  // Assuming category_id 2 exists
                'title_en' => 'Graphic Design',
                'title_tr' => 'Grafik Tasarım',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,  // Assuming category_id 2 exists
                'title_en' => 'UI/UX Design',
                'title_tr' => 'Kullanıcı Arayüzü/Kullanıcı Deneyimi Tasarımı',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,  // Assuming category_id 3 exists
                'title_en' => 'Data Analysis',
                'title_tr' => 'Veri Analizi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
