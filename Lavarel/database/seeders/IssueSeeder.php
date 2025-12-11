<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Lấy danh sách ID của các máy tính đã tạo
        $computerIds = DB::table('computers')->pluck('id')->toArray();

        // Kiểm tra nếu không có máy tính nào thì không chạy tiếp để tránh lỗi
        if (empty($computerIds)) {
            $this->command->info('Chưa có dữ liệu máy tính (computers). Vui lòng chạy ComputerSeeder trước!');
            return;
        }

        // Xóa dữ liệu cũ (nếu có)
        DB::table('issues')->delete();

        // Danh sách các mô tả vấn đề phổ biến
        $descriptions = [
            'Máy tính không khởi động được',
            'Màn hình hiển thị màn hình xanh (Blue Screen)',
            'Ổ cứng phát ra tiếng kêu lạ',
            'Máy tính tự động tắt khi đang sử dụng',
            'Không kết nối được mạng internet',
            'Ổ cứng đầy, không còn dung lượng trống',
            'Phần mềm bị lỗi, không thể cài đặt',
            'Bàn phím hoặc chuột không hoạt động',
            'Máy tính chạy chậm, đơ',
            'Quạt tản nhiệt không hoạt động, máy nóng',
            'Lỗi driver, thiết bị không nhận diện được',
            'Màn hình bị sọc hoặc không hiển thị',
            'USB port không hoạt động',
            'Lỗi hệ điều hành, cần cài lại',
            'Máy tính bị nhiễm virus'
        ];

        // Tạo 50 vấn đề báo cáo mẫu
        for ($i = 0; $i < 50; $i++) {
            $urgency = $faker->randomElement(['Low', 'Medium', 'High']);
            $status = $faker->randomElement(['Open', 'In Progress', 'Resolved']);
            
            // Nếu status là Resolved, reported_date nên ở quá khứ xa hơn
            $reportedDate = $status === 'Resolved' 
                ? $faker->dateTimeBetween('-30 days', '-1 day')
                : $faker->dateTimeBetween('-7 days', 'now');

            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computerIds),
                'reported_by' => $faker->optional(0.7)->name, // 70% có người báo cáo
                'reported_date' => $reportedDate,
                'description' => $faker->randomElement($descriptions),
                'urgency' => $urgency,
                'status' => $status,
                'created_at' => $reportedDate,
                'updated_at' => $reportedDate,
            ]);
        }
    }
}
