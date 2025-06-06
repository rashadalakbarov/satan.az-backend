<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name',       'value' => 'Satan.az'],
            ['key' => 'logo_url',        'value' => '/images/logo.png'],
            ['key' => 'facebook_url',    'value' => 'https://facebook.com/myPage'],
            ['key' => 'instagram_url',   'value' => 'https://instagram.com/myPage'],
            ['key' => 'tiktok_url',      'value' => 'https://tiktok.com/@myPage'],
            ['key' => 'phone',           'value' => '+99455 821 56 73'],
            ['key' => 'address',         'value' => 'Bakı, Azərbaycan'],
            ['key' => 'primary_color',   'value' => '#0d6efd'],
            ['key' => 'secondary_color', 'value' => '#6c757d'],
            ['key' => 'email',           'value' => 'info@myawesomesite.com'],
        ];

        foreach ($settings as $setting) {
            DB::table('configs')->updateOrInsert(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
