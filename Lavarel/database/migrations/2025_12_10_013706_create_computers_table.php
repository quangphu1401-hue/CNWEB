<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id(); // Mã máy tính
            $table->string('computer_name', 50); // Tên máy tính (ví dụ: Lab1-PC05)
            $table->string('model', 100); // Tên phiên bản (ví dụ: Dell Optiplex 7090)
            $table->string('operating_system', 50); // Hệ điều hành (ví dụ: Windows 10 Pro)
            $table->string('processor', 50); // Bộ vi xử lý (ví dụ: Intel Core i5-11400)
            $table->integer('memory'); // Bộ nhớ RAM (GB)
            $table->boolean('available')->default(true); // Trạng thái hoạt động
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
