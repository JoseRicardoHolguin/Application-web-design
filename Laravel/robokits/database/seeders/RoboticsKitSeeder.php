<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoboticsKit;

class RoboticsKitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoboticsKit::create([
            'name' => 'starterkit',
            'description' => 'Kit de robótica para principiantes, ideal para aprender los conceptos básicos de la robótica y la programación.',
            'price' => 199.99,
            'stock' => 50
        ]);

        RoboticsKit::create([
            'name' => 'Educational Robotics Kit',
            'description' => 'Kit de robótica educativa diseñado para estudiantes, con componentes versátiles para proyectos de aprendizaje y desarrollo de habilidades en robótica.',
            'price' => 99.99,
            'stock' => 5
        ]);

        RoboticsKit::create([
            'name' => 'Kit5',
            'description' => 'Kit numero 5 oye si.',
            'price' => 9.99,
            'stock' => 15
        ]);
    }
}
