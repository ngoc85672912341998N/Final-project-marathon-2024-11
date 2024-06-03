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
        Schema::create('list_courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('id_course');
            $table->string('start_date');
            $table->string('end_date');
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
