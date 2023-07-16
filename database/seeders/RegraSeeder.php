<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regras')->insert([
            ['regra' => 'user_create', 'label_regra'=>'Criar Usuário'],
            ['regra' => 'user_edit', 'label_regra'=>'Criar Editar'],
        ]);
    }
}
