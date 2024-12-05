<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->call([
           ProgramaSeeder::class,
           ProfesorSeeder::class     
        ]);

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
        
        /*Usando Query Builder
        DB::table('users')->insert([
            'name' => "Norma Barta",
            'email' => "norma@barta.com",
            'password' =>Hash::make('12345678'),
        ]);*/
    }

}
