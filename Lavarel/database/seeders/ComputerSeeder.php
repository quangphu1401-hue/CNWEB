<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Xóa dữ liệu cũ (nếu có)
        DB::table('computers')->delete();

        // Danh sách các model máy tính phổ biến
        $models = [
            'Dell Optiplex 7090',
            'Dell Optiplex 7080',
            'HP EliteDesk 800 G6',
            'HP ProDesk 600 G6',
            'Lenovo ThinkCentre M90',
            'Lenovo ThinkCentre M80',
            'Acer Veriton X4630G',
            'ASUS ExpertCenter D500SA'
        ];

        // Danh sách hệ điều hành
        $operatingSystems = [
            'Windows 10 Pro',
            'Windows 11 Pro',
            'Windows 10 Enterprise',
            'Windows 11 Enterprise',
            'Ubuntu 22.04 LTS',
            'Ubuntu 20.04 LTS'
        ];

        // Danh sách bộ vi xử lý
        $processors = [
            'Intel Core i5-11400',
            'Intel Core i5-10400',
            'Intel Core i7-11700',
            'Intel Core i7-10700',
            'AMD Ryzen 5 5600G',
            'AMD Ryzen 7 5700G'
        ];

        // Tạo 30 máy tính mẫu
        for ($i = 1; $i <= 30; $i++) {
            $labNumber = $faker->numberBetween(1, 5);
            $pcNumber = str_pad($faker->numberBetween(1, 20), 2, '0', STR_PAD_LEFT);
            
            DB::table('computers')->insert([
                'computer_name' => "Lab{$labNumber}-PC{$pcNumber}",
                'model' => $faker->randomElement($models),
                'operating_system' => $faker->randomElement($operatingSystems),
                'processor' => $faker->randomElement($processors),
                'memory' => $faker->randomElement([4, 8, 16, 32]), // RAM: 4GB, 8GB, 16GB, 32GB
                'available' => $faker->boolean(80), // 80% khả năng available
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
