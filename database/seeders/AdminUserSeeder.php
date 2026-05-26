<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        AdminUser::firstOrCreate(
            ['email' => 'admin@setisan.com.tr'],
            [
                'name'     => 'Setisan Admin',
                'password' => Hash::make('Setisan2024!'),
                'role'     => 'super_admin',
            ]
        );
    }
}
