<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;
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
        Genre::create(["name"=>"Strategy"]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
