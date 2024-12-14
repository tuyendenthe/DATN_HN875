<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động tăng
            $table->string('message'); // Nội dung thông báo
            $table->string('bill_code')->nullable(); // Mã đơn hàng (có thể null)
            $table->boolean('is_read')->default(false); // Đánh dấu đã đọc
            $table->timestamps(); // Thời gian tạo và cập nhật
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications'); // Xóa bảng khi rollback
    }
}
