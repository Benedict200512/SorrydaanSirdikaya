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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->enum('gender', ['male', 'female', 'other']); 

            $table->unsignedBigInteger('membership_id');
            $table->unsignedBigInteger('coach_id');
            $table->unsignedBigInteger('workout_id');

            $table->timestamps();
        });

        
        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('membership_id')->references('id')->on('memberships')->onDelete('cascade');
            $table->foreign('coach_id')->references('id')->on('coaches')->onDelete('set null');
            $table->foreign('workout_id')->references('id')->on('workouts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
