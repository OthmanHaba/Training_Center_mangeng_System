<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Program;
use App\Models\Trainee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         $trainees =  \App\Models\User::factory(10)->create();
//            $trainees->each(function ($trainee){
//                return \App\Models\Trainee::factory()->create([
//                    'name' => $trainee->name,
//                ]);
//            });
         \App\Models\User::factory()->create([
             'name' => 'othman',
             'email' => 'oth@oth.com',
         ]);
        Trainee::factory(10)->create();
        Program::factory()->create();

    }
}
