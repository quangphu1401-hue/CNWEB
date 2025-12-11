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
        Schema::create('sales', function (Blueprint $table) {
            // sale_id (INT PRIMARY KEY)
            $table->id('sale_id');
            // medicine_id (INT) - Khóa ngoại
            $table->unsignedBigInteger('medicine_id');
            // quantity (INT)
            $table->integer('quantity');
            // sale_date (DATETIME)
            $table->dateTime('sale_date');
            // customer_phone (VARCHAR 10)
            $table->string('customer_phone', 10)->nullable();
            $table->timestamps();

            // Tạo liên kết khóa ngoại
            $table->foreign('medicine_id')->references('medicine_id')->on('medicines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
