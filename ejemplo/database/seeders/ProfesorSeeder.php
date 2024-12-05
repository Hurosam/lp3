<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Profesor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Programa;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 
    public function run(): void
    {
        // Llama al seeder de programas primero
        $this->call(ProgramaSeeder::class);
        
        Profesor::factory(20)->create();
        
        /*DB::table('profesors')->insert([
            'dni'=> "1234567",
            'nombres'=>"Norma",
            'apellidos'=>"Barta",
            'id_progrma'=>"1",

        ]);

        DB::table('profesors')->insert([
            'dni'=> "7654321",
            'nombres'=>"Luna",
            'apellidos'=>"Sol",
            'id_programa'=>"2",

        ]);*/
    }

}
