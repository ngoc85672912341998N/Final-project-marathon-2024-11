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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('role_id_course');
            $table->integer('price');
            $table->string('course_description');
            $table->integer('course_time');
            $table->integer('users_limit');
            $table->timestamps();
            
            $table->foreign('role_id_course')
                 ->references('id')->on('roles_course')->onDelete('cascade');
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
