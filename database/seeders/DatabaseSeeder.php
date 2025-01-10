<?php

namespace Database\Seeders;

use App\Models\Designation;
use App\Models\Organization;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
                'name' => 'Kim M. Manoguid',
                'email' => 'manoguid@gmail.com',
                'role' => 'Super Admin'
            ]
        );


        // Organizations
        $organizations = [
            ['name' => 'Toda'],
            ['name' => 'Senior Citizen'],
            ['name' => 'Farmers'],
            ['name' => 'BHW']
        ];

        foreach ($organizations as $organization) {
            Organization::create($organization);
        }


        // Designations
        $designations = [
            ['name' => 'Barcoo'],
            ['name' => 'Purok Leader']
        ];

        foreach ($designations as $designation) {
            Designation::create($designation);
        }
    }
}
