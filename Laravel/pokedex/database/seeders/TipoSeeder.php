<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipo;


class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Tipo::create([
        'nombre' => 'Fuego',
        'debilidad' => 'Agua',
        'fortaleza' => 'Planta'
    ]);

    Tipo::create([
        'nombre' => 'Agua',
        'debilidad' => 'Eléctrico',
        'fortaleza' => 'Fuego'
    ]);

    Tipo::create([
        'nombre' => 'Planta',
        'debilidad' => 'Fuego',
        'fortaleza' => 'Agua'
    ]);
}
}
