<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert(
            [
                ['name' => '豚肉', 'genre_id' => 4],
                ['name' => '玉ねぎ', 'genre_id' => 6],
                ['name' => 'にんじん', 'genre_id' => 6],
                ['name' => 'なす', 'genre_id' => 6],
                ['name' => 'キャベツ', 'genre_id' => 6],
                ['name' => 'ピーマン', 'genre_id' => 6],
                ['name' => 'じゃがいも', 'genre_id' => 6],
                ['name' => 'カレールー', 'genre_id' => 14],
                ['name' => 'シチュールー', 'genre_id' => 14]
            ]
        );
    }
}
