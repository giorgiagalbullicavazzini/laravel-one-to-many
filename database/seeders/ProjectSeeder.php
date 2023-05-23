<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Project::truncate();

        for ($i = 1; $i <= 10; $i++) {

            $newProject = new Project;

            $newProject->title = $faker->sentence(3);
            $newProject->description = $faker->paragraph();
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->status = $faker->word();
            $newProject->tags = $faker->randomElement(['web app', 'front-end', 'back-end']);
            $newProject->release_date = $faker->date();
            $newProject->languages = $faker->randomElement(['html', 'css', 'bootstrap', 'scss', 'javascript', 'vuejs', 'php', 'laravel']);

            $newProject->save();
        }
    }
}
