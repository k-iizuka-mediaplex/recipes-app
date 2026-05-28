<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create(['name' => '米・雑穀・シリアル']);
        Genre::create(['name' => '麺類']);
        Genre::create(['name' => 'パン']);
        Genre::create(['name' => 'お肉・肉加工品']);
        Genre::create(['name' => '魚介・水産加工品']);
        Genre::create(['name' => '野菜']);
        Genre::create(['name' => '果物']);
        Genre::create(['name' => '卵・チーズ・乳製品']);
        Genre::create(['name' => '豆腐・納豆・漬物類']);
        Genre::create(['name' => 'ジャム・ハチミツ・チョコレート']);
        Genre::create(['name' => '粉類']);
        Genre::create(['name' => '乾物']);
        Genre::create(['name' => '缶詰']);
        Genre::create(['name' => '調味料']);
        Genre::create(['name' => '水、酒、飲料']);
        Genre::create(['name' => '未分類']);
    }
}
