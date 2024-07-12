<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\IndoRegionSeeder;
use Database\Seeders\IndoRegionRegencySeeder;
use Database\Seeders\IndoRegionVillageSeeder;
use Database\Seeders\IndoRegionDistrictSeeder;
use Database\Seeders\IndoRegionProvinceSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([IndoRegionSeeder::class, IndoRegionProvinceSeeder::class, IndoRegionRegencySeeder::class,   IndoRegionDistrictSeeder::class, IndoRegionVillageSeeder::class]);
        
        DB::table('admins')->insert([
            [
                'name' => 'Admin Super',
                'email' => 'superadmin@admin.com',
                'password' => Hash::make('admin17'),
                'type' => 'superadmin',
            ],
            [
                'name' => 'Admin Satu',
                'email' => 'adminsatu@admin.com',
                'password' => Hash::make('admin17'),
                'type' => 'admin',
            ],
            [
                'name' => 'Admin Dua',
                'email' => 'admindua@admin.com',
                'password' => Hash::make('admin17'),
                'type' => 'admin',
            ]
        ]);
    }
}
