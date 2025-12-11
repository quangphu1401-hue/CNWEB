<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Lấy tất cả ID thuốc đang có
        $medicineIds = DB::table('medicines')->pluck('medicine_id')->toArray();

        // Kiểm tra nếu không có thuốc nào thì không chạy tiếp để tránh lỗi
        if (empty($medicineIds)) {
            $this->command->info('Chưa có dữ liệu thuốc (medicines). Vui lòng chạy MedicineSeeder trước!');
            return;
        }

        // Xóa dữ liệu cũ (nếu có)
        DB::table('sales')->delete();

        for ($i = 0; $i < 200; $i++) { // Sinh 200 giao dịch
            DB::table('sales')->insert([
                'medicine_id' => $faker->randomElement($medicineIds),
                'quantity' => $faker->numberBetween(1, 10),
                'sale_date' => $faker->dateTime,
                'customer_phone' => $faker->numerify('09########'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
