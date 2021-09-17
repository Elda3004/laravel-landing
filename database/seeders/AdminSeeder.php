<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'is_admin' => 1,
            'password' => Hash::make('admin123'),
        ]);
    }
}
