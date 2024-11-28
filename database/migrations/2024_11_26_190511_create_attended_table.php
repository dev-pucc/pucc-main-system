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
        Schema::create('attended', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Student name
            $table->string('student_id'); // Student ID
            $table->unsignedBigInteger('meeting_id'); // Foreign key
            $table->timestamps();

            // Define foreign key constraint for meeting_id
            $table->foreign('meeting_id')
                ->references('id')
                ->on('meetings')
                ->onDelete('cascade'); // Cascade delete if a meeting is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attended');
    }
};
