<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profession::truncate();
        $english_professions=config('professions.english');
        $turkish_professions=config('professions.turkish');
        for($i=0; $i<count($english_professions); $i++){
            $data['heading_en']=$english_professions[$i]['title'];
            $data['heading_tr']=$turkish_professions[$i]['title'];
            for($y=0; $y<count($english_professions[$i]['fields']); $y++){
                $data['title_en']=$english_professions[$i]['fields'][$y];
                $data['title_tr']=$turkish_professions[$i]['fields'][$y];
                Profession::create($data);
            }
        }
    }
}
