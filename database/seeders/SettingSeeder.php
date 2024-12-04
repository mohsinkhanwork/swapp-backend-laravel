<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings=[
            ['key'=>'skill-passing-percentage','value'=>60,'value_type'=>'number'],
            ['key'=>'enable-google-ads','value'=>1,'value_type'=>'checkbox'],
            ['key'=>'rectangle-google-ad','value'=>'','value_type'=>'textarea'],
            ['key'=>'leaderboard-google-ad','value'=>'','value_type'=>'textarea'],
            ['key'=>'skyscraper-google-ad','value'=>'','value_type'=>'textarea'],
            ['key'=>'support-email','value'=>'info@skillswap.com','value_type'=>'email'],
            ['key'=>'support-phone','value'=>'+391 (0)35 2568 4593','value_type'=>'text'],
        ];
        foreach($settings as $setting){
            Setting::firstOrCreate([
                'key'=>$setting['key']
            ],[
                'value'=>$setting['value'],
                'value_type'=>$setting['value_type']
            ]);
        }
    }
}
