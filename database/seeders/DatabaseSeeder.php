<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        $this->call(AdminSeeder::class);
        User::create([
            'name' => 'Admin',
            'email' => 'alimoustafaprogram@gmail.com',
            'password' => '2zek3aml',
        ]);
        User::create([
            'name' => 'User',
            'email' => 'alimoustafa10101@yahoo.com',
            'password' => '2zek3aml',
        ]);
    }
}
//\App\Models\Category::factory(6)->create();
//\App\Models\Product::factory(16)->create();
