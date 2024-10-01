<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToDepartments extends Migration
{
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->timestamps(); // Thêm created_at và updated_at
        });
    }

    public function down()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropTimestamps(); // Xóa created_at và updated_at nếu rollback
        });
    }
}
