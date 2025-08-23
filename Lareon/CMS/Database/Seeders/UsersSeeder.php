<?php

namespace Lareon\CMS\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Lareon\CMS\App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->insert([
            'parent_id' => null,
            'name' => 'Sina',
            'lastname' => 'Zangiband',
            'email' => 'sina.zangiband@gmail.com',
            'phone' => '09126037279',
            'telegram_id' => null,
            'featured_image' => null,
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
            'password' => Hash::make('sina.zangiband@gmail.com'),
        ]);
    }
}
