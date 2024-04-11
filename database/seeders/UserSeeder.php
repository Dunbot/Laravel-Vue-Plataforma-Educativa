<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #Admin and Editor user for default
        $admin = User::create(['name' => 'admin',
        'email' => 'admin@mail.com',
        'password' => Hash::make('admin')]);

        $editor = User::create(['name' => 'editor',
        'email' => 'editor@mail.com',
        'password' => Hash::make('editor')]);

        #Assigning roles
        $admin -> assignRole('admin');
        $editor -> assignRole('editor');
    }
}
