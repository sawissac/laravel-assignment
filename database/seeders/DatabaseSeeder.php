<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
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

        $this->call(RoleAndPermissionSeeder::class);
        $this->call(AdminSeeder::class);
        // $this->call(PostSeeder::class);
        Author::create([
            'name' => "Sayar Gyi"
        ]);
        Author::create([
            'name' => "Sayar Gyi Nyi Lay"
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
