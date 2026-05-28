<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recipes')->insert([
            ['name' => 'カレー', 'description' => null],
            ['name' => '肉じゃが', 'description' => '肉じゃがの説明'],
            ['name' => '回鍋肉', 'description' => '回鍋肉の説明'],
            ['name' => '青椒肉絲', 'description' => '青椒肉絲の説明'],
            ['name' => 'シチュー', 'description' => 'シチューの説明'],
        ]);
    }
}
