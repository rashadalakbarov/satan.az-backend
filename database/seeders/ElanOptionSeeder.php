<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ElanOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('elan_options')->insert([
            'elan_id' => 1,
            'category_id' => 47,
            'option_id' => 141,
            'value' => 126,
        ]);

        DB::table('elan_options')->insert([
            'elan_id' => 1,
            'category_id' => 47,
            'option_id' => 108,
            'value' => null,
        ]);

        DB::table('elan_options')->insert([
            'elan_id' => 1,
            'category_id' => 47,
            'option_id' => 41,
            'value' => null,
        ]);
    }
}
