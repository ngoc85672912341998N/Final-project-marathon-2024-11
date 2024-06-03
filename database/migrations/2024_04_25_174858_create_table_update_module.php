<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('course', function (Blueprint $table) {
        $table->string('name_module')->nullable(); // Thêm một cột string có thể null
        $table->string('decription_module')->nullable(); // Thêm một cột string có thể null
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('course', function (Blueprint $table) {
        $table->dropColumn('name_module'); // Xóa cột nếu rollback
        $table->dropColumn('decription_module'); // Xóa cột nếu rollback
    });
}
};
