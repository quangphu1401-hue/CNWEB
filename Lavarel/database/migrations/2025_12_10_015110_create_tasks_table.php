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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tiêu đề công việc
            $table->text('description'); // Mô tả ngắn
            $table->text('long_description')->nullable(); // Mô tả chi tiết (có thể để trống)
            $table->boolean('completed')->default(false); // Trạng thái hoàn thành
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
