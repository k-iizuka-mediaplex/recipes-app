<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            ['id' => 1,  'name' => '米・雑穀・シリアル'],
            ['id' => 2,  'name' => '麺類'],
            ['id' => 3,  'name' => 'パン'],
            ['id' => 4,  'name' => 'お肉・肉加工品'],
            ['id' => 5,  'name' => '魚介・水産加工品'],
            ['id' => 6,  'name' => '野菜'],
            ['id' => 7,  'name' => '果物'],
            ['id' => 8,  'name' => '卵・チーズ・乳製品'],
            ['id' => 9,  'name' => '豆腐・納豆・大豆加工品'],
            ['id' => 10, 'name' => 'きのこ・海藻類'],
            ['id' => 11, 'name' => '粉類・製菓材料'],
            ['id' => 12, 'name' => '乾物・乾燥食品'],
            ['id' => 13, 'name' => '缶詰・瓶詰'],
            ['id' => 14, 'name' => '調味料・ソース類'],
            ['id' => 15, 'name' => '油脂類'],
            ['id' => 16, 'name' => '水・酒・飲料'],
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
