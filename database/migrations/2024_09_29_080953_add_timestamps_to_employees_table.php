<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // php artisan make:migration add_timestamps_to_employees_table --table=employees
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->timestamps(); // Thêm các cột created_at và updated_at
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropTimestamps(); // Xóa các cột created_at và updated_at nếu cần rollback
        });
    }
    //php artisan migrate
};
