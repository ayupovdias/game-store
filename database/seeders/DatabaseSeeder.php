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
        Genre::create(["name"=>"fiction"]);
        Genre::create(["name"=>"fantasy"]);
        Genre::create(["name"=>"sandbox"]);
        Genre::create(["name"=>"RPG"]);
        Genre::create(["name"=>"strategy"]);

        Game::factory(25)->create();

        Role::create(["name"=>"ADMIN"]);
        Role::create(["name"=>"DEVELOPER"]);
        Role::create(["name"=>"JOURNALIST"]);
        Role::create(["name"=>"USER"]);

    }
}
