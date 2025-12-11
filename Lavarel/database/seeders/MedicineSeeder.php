<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Xóa dữ liệu cũ (nếu có)
        DB::table('medicines')->delete();
        
        for ($i = 0; $i < 100; $i++) { // Sinh 100 loại thuốc
            DB::table('medicines')->insert([
                'name' => $faker->word,
                'brand' => $faker->company,
                'dosage' => '10mg',
                'form' => $faker->randomElement(['Viên nén', 'Viên nang', 'Xi-rô']),
                'price' => $faker->randomFloat(2, 10, 100),
                'stock' => $faker->numberBetween(0, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
