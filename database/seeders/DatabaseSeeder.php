<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RolesPermissionsSeeder::class);

        User::factory()->create([
            'name'  => 'Rhykos',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name'  => 'Test User 2',
            'email' => 'test2@example.com',
        ]);
    }
}
