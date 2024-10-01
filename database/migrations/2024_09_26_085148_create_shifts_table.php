<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->tinyInteger('ShiftID')->primary();  // Khóa chính
            $table->longText('Name')->index();  // Index for faster search
            $table->time('StartTime');  // Giờ bắt đầu ca làm việc
            $table->time('EndTime');    // Giờ kết thúc ca làm việc
            $table->timestamp('ModifiedDate')->nullable()->useCurrent();  // Ngày cập nhật cuối
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
