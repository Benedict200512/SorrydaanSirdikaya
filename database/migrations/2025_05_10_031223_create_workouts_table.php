<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;  // Add this

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');  
            $table->integer('duration');  
            $table->string('intensity');  
            $table->timestamps();
        });

        $workouts = [
            [
                'name' => 'Push-ups',
                'duration' => 15,
                'intensity' => 'Medium',
            ],
            [
                'name' => 'Squats',
                'duration' => 20,
                'intensity' => 'High',
            ],
            [
                'name' => 'Jogging',
                'duration' => 30,
                'intensity' => 'Low',
            ]
        ];

        foreach ($workouts as $workout) {
            DB::table('workouts')->insert($workout);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('workouts');
    }
};
