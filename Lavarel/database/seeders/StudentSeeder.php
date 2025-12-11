<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        // Lấy danh sách ID của các lớp học đã tạo
        // Nếu chưa có dữ liệu bảng classes, lệnh này sẽ lỗi. Hãy chắc chắn đã chạy ClassSeeder trước.
        $classIds = DB::table('classes')->pluck('id')->toArray();

        // Kiểm tra nếu không có lớp nào thì không chạy tiếp để tránh lỗi
        if (empty($classIds)) {
            $this->command->info('Chưa có dữ liệu lớp học (classes). Vui lòng chạy ClassSeeder trước!');
            return;
        }

        // Xóa dữ liệu cũ (nếu có)
        DB::table('students')->delete();

        for ($i = 0; $i < 50; $i++) { // Sinh 50 học sinh
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date(),
                'parent_phone' => $faker->numerify('09########'),
                'class_id' => $faker->randomElement($classIds), // Chọn ngẫu nhiên 1 lớp
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}