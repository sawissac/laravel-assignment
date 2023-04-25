<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'name' => 'Issac',
            'email' => 'hello@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $editor = User::create([
            'name' => 'Issac2',
            'email' => 'hello2@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $admin->assignRole('SuperAdmin');
        $editor->assignRole('Editor');
    }
}
