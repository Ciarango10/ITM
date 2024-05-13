<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notes = [
            ['title' => 'Participaciones PHP', 'content' => 'Terminar mis participaciones en php', 'category_id' => 1],
            ['title' => 'Aprender a tocar un instrumento', 'content' => 'Tocar el piano', 'category_id' => 2]
        ];

        DB::table('notes')->insert($notes);
    }
}
