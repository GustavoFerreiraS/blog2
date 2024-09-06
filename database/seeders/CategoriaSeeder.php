<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            'name' => 'Bolos',
        ]);

        DB::table('categorias')->insert([
            'name' => 'Massas',
        ]);

        DB::table('categorias')->insert([
            'name' => 'Pizza',
        ]);

    }



}


