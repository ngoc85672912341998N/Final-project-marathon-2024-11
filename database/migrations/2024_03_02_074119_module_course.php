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
        Schema::create('module_courses', function (Blueprint $table) {
            $table->id();
            $table->string('name_module');
            $table->string('description');
            $table->string('id_course');
            $table->timestamps();
            $table->foreign('id_course')
                 ->references('name')->on('course')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
