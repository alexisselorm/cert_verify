<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\Students;
use App\Models\Program_Type;
use App\Models\Program_RunType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Students::factory(5)->create();
        Program::factory(5)->create();
        Program_RunType::factory(3)->create();
        Program_Type::factory(3)->create();
    }
}
