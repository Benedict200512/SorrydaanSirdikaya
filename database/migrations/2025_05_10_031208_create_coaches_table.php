<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phonenumber');
            $table->string('specialization');
            $table->timestamps();
        });

        // Seed initial data
        $coaches = [
            [
                'first_name' => 'Johnrey',
                'last_name' => 'Cilin',
                'email' => 'johnrey@email.com',
                'phonenumber' => '1234567890',
                'specialization' => 'Cardio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Adok',
                'last_name' => 'Alicante',
                'email' => 'alicantadok@email.com',
                'phonenumber' => '0987654321',
                'specialization' => 'Strength Training',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('coaches')->insert($coaches);
    }

    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
