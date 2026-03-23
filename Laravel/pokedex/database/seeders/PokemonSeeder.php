<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    Pokemon::create([
        'nombre' => 'Charmander',
        'nivel' => 5,
        'tipo_id' => 1
    ]);

    Pokemon::create([
        'nombre' => 'Squirtle',
        'nivel' => 5,
        'tipo_id' => 2
    ]);

    Pokemon::create([
        'nombre' => 'Bulbasaur',
        'nivel' => 5,
        'tipo_id' => 3
    ]);
}
}
