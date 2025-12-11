<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Xóa dữ liệu cũ (nếu có) để tránh trùng lặp khi chạy lại
        DB::table('classes')->delete();

        // Thêm dữ liệu mới
        DB::table('classes')->insert([
            [
                'grade_level' => 'Pre-K', 
                'room_number' => 'VH7', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'grade_level' => 'Kindergarten', 
                'room_number' => 'VH8', 
                'created_at' => now(), 
                'updated_at' => now()
            ]
        ]);
    }
}