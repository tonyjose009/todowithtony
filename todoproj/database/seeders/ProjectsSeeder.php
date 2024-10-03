<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Provider\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        for ($i=1; $i<=3; $i++){
            Project::create(
                [
                        'name' => fake()->jobTitle()
                ]
            );
        }
    }
}
