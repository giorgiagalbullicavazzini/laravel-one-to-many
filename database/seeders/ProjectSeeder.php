<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Models\Type;
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

            $type = Type::inRandomOrder()->first();

            $newProject = new Project;

            $newProject->title = $faker->sentence(3);
            $newProject->description = $faker->paragraph();
            $newProject->type_id = $type->id;
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->status = $faker->word();
            $newProject->release_date = $faker->date();
            $newProject->languages = $faker->randomElement(['html', 'css', 'bootstrap', 'scss', 'javascript', 'vuejs', 'php', 'laravel']);

            $newProject->save();
        }
    }
}
