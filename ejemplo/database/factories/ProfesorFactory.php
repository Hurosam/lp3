<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profesor>
 */
class ProfesorFactory extends Factory
{
    //protected $model = Profesor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni'=> fake('es_PE')->dni(),
            'nombres'=> fake('es_PE')->firstName() ,
            'apellidos'=> fake('es_PE')->lastName() ,
            //'id_programa'=> fake()->randomBetween(1,2)
            'id_programa'=> fake()->numberBetween(1,2)
        ];
    }
}
