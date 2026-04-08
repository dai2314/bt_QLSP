<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->string('name'); // Tên danh mục (Ví dụ: Điện thoại, Laptop)
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};