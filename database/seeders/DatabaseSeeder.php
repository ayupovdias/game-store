<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Game;
use App\Models\Role;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $genres = [
            "Action",
            "Adventure",
            "Action-Adventure",
            "Role-Playing (RPG)",
            "Strategy",
            "Simulation",
            "Sandbox",
            "Open World",
            "Shooter",
            "First-Person Shooter (FPS)",
            "Third-Person Shooter",
            "Survival",
            "Horror",
            "Puzzle",
            "Platformer",
            "Racing",
            "Sports",
            "Fighting",
            "Roguelike",
            "Casual"
        ];
        foreach ($genres as $genre) {
            Genre::create(['name' => $genre]);
        }

        Role::create(["name"=>"ADMIN"]);
        Role::create(["name"=>"DEVELOPER"]);
        Role::create(["name"=>"JOURNALIST"]);
        Role::create(["name"=>"USER"]);

    }
}
