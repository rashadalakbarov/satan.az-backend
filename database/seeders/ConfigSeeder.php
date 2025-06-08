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
            ['key' => 'site_name',       'value' => 'PicTap.az',                    'other' => ''],
            ['key' => 'logo_url',        'value' => 'storage/logo/logo.png',        'other' => ''],
            ['key' => 'facebook_url',    'value' => 'https://facebook.com/PicTap',  'other' => 'FaFacebookF'],
            ['key' => 'instagram_url',   'value' => 'https://instagram.com/PicTap', 'other' => 'FaInstagram'],
            ['key' => 'phone',           'value' => '+99455 821 56 73',             'other' => ''],
            ['key' => 'address',         'value' => 'Bakı, Azərbaycan',             'other' => ''],
            ['key' => 'primary_color',   'value' => '#6bbe66',                      'other' => ''],
            ['key' => 'secondary_color', 'value' => '#00a1f1',                      'other' => ''],
            ['key' => 'other_color',     'value' => '#ff4141',                      'other' => ''],
            ['key' => 'email',           'value' => 'pictap.official@gmail.com',    'other' => ''],
        ];

        foreach ($settings as $setting) {
            DB::table('configs')->updateOrInsert(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'other' => $setting['other'],
                ]
            );
        }
    }
}
