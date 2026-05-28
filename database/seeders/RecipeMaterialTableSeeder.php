<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeMaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('material_recipe')->insert([
            ['recipe_id' => 1, 'material_id' => 1],
            ['recipe_id' => 1, 'material_id' => 2],
            ['recipe_id' => 1, 'material_id' => 3],
            ['recipe_id' => 1, 'material_id' => 7],
            ['recipe_id' => 1, 'material_id' => 8],

            ['recipe_id' => 2, 'material_id' => 1],
            ['recipe_id' => 2, 'material_id' => 2],
            ['recipe_id' => 2, 'material_id' => 3],
            ['recipe_id' => 2, 'material_id' => 7],

            ['recipe_id' => 3, 'material_id' => 1],
            ['recipe_id' => 3, 'material_id' => 5],
            ['recipe_id' => 3, 'material_id' => 6],

            ['recipe_id' => 4, 'material_id' => 1],
            ['recipe_id' => 4, 'material_id' => 3],
            ['recipe_id' => 4, 'material_id' => 6],

            ['recipe_id' => 5, 'material_id' => 2],
            ['recipe_id' => 5, 'material_id' => 3],
            ['recipe_id' => 5, 'material_id' => 7],
            ['recipe_id' => 5, 'material_id' => 9],

        ]);
    }
}
