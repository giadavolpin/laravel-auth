<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $Project = new Project();
            $Project->title = $faker->sentence(3);
            $Project->slug = Str::slug($Project->title, '-');
            $Project->content = $faker->text(500);
            $Project->save();
        }
    }
}