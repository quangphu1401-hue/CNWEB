<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task; // <--- Quan trọng: Phải thêm dòng này để gọi được Model Task

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'title' => 'Đi chợ mua rau',
                'description' => 'Mua rau muống, rau cải, cà chua, hành lá',
                'long_description' => 'Nhớ mua rau sạch, rau hữu cơ ở cửa hàng uy tín. Chú ý chọn rau tươi, không bị dập nát.',
                'completed' => false,
            ],
            [
                'title' => 'Hoàn thành báo cáo',
                'description' => 'Hoàn thành báo cáo cuối tháng',
                'long_description' => 'Báo cáo cần bao gồm các số liệu về doanh thu, chi phí, lợi nhuận. Phân tích các yếu tố ảnh hưởng đến kết quả kinh doanh.',
                'completed' => true,
            ],
            [
                'title' => 'Học tiếng Anh',
                'description' => 'Học 30 từ vựng mới',
                'long_description' => null,
                'completed' => false,
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}