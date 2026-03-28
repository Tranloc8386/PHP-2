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
    Schema::create('books', function (Blueprint $table) {
        $table->id(); // INT PRIMARY KEY AUTO_INCREMENT
        $table->string('title', 255); // VARCHAR(255) NOT NULL
        $table->string('author', 150)->nullable(); // VARCHAR(150)
        $table->decimal('price', 10, 2); // DECIMAL(10,2) NOT NULL
        $table->integer('stock')->default(0); // INT DEFAULT 0
        $table->string('img', 200)->nullable(); // VARCHAR(200)
        $table->text('description')->nullable(); // TEXT
        $table->timestamps(); // Tạo thêm created_at và updated_at (tốt cho quản lý)
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
