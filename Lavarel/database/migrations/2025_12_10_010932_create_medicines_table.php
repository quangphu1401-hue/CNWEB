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
        Schema::create('medicines', function (Blueprint $table) {
            // medicine_id (INT PRIMARY KEY)
            $table->id('medicine_id');
            // name (VARCHAR 255)
            $table->string('name', 255);
            // brand (VARCHAR 100) - Tùy chọn
            $table->string('brand', 100)->nullable();
            // dosage (VARCHAR 50)
            $table->string('dosage', 50);
            // form (VARCHAR 50)
            $table->string('form', 50);
            // price (DECIMAL 10,2)
            $table->decimal('price', 10, 2);
            // stock (INT)
            $table->integer('stock');
            $table->timestamps();
        });
    }
};
