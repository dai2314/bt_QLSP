<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên sản phẩm
            $table->decimal('price', 15, 2); // Giá sản phẩm (tối đa 15 chữ số, 2 số thập phân)
            $table->integer('quantity'); // Số lượng
            $table->string('image')->nullable(); // Đường dẫn ảnh (cho phép rỗng)
            
            // Thiết lập khóa ngoại (Yêu cầu 2.2)
            // constrained() tự hiểu liên kết với bảng 'categories' qua cột 'id'
            // onDelete('cascade') nghĩa là xóa danh mục thì sản phẩm tự xóa theo
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};