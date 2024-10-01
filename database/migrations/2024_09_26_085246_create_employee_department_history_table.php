<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Chạy migrations.
     */
    public function up(): void
    {
        Schema::create('employee_department_history', function (Blueprint $table) {
            $table->unsignedBigInteger('BusinessEntityID');  // Khóa ngoại từ bảng employees
            $table->smallInteger('DepartmentID');  // Khóa ngoại từ bảng departments
            $table->tinyInteger('ShiftID');  // Khóa ngoại từ bảng shifts
            $table->date('StartDate');  // Ngày bắt đầu công việc
            $table->date('EndDate')->nullable();  // Ngày kết thúc công việc
            $table->timestamp('ModifiedDate')->useCurrent();  // Ngày cập nhật cuối

            // Định nghĩa các khóa ngoại
            $table->foreign('BusinessEntityID')->references('BusinessEntityID')->on('employees')->onDelete('cascade');
            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments')->onDelete('cascade');
            $table->foreign('ShiftID')->references('ShiftID')->on('shifts')->onDelete('cascade');

            // Thêm index nếu cần
            $table->index('BusinessEntityID');
            $table->index('DepartmentID');
            $table->index('ShiftID');
        });
    }

    /**
     * Lùi lại migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_department_history');
    }
};

