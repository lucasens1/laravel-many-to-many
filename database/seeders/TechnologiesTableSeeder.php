<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = ['Vue.js', 'React', 'Laravel', 'JS Plain', 'Python'];
        foreach($technologies as $tech){
            $newTechnology = new Technology();
            $newTechnology->name = $tech;
            $newTechnology->version = $faker->randomElement(['1.0','1.5','2.0', '2.5', '3.0']);
            $newTechnology->description = $faker->text(100);
            $newTechnology->docs = $faker->url();
            $newTechnology->save();
        }
    }
}
