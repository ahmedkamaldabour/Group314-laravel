<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function bcrypt;
use function hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

//         \App\Models\User::create([
//             'name' => 'ahmed',
//             'email' => 'admin@admin.com',
//             'password' => bcrypt('123456'),
//             'phone' => '01000000000',
//             'role' => 'admin',
//         ]);

        // call MajorSeeder
        $this->call(
            [
                MajorSeeder::class,
                DoctorSeeder::class,
            ]
        );
    }
}
