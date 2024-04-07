<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            ['name' => 'General', 'is_hidden' => false],
            ['name' => 'Informática', 'is_hidden' => false],
            ['name' => 'Clases', 'is_hidden' => true]
        ];

        DB::table('sections')->insert($sections);
    }
}
