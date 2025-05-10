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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');  
            $table->string('lastname');  
            $table->string('email')->unique();  
            $table->string('phonenumber');  
            $table->string('specialization');  
            $table->timestamps();
        });

        
        $coaches = [
            [
                'firstname' => 'Johnrey',
                'lastname' => 'Cilin',
                'email' => 'johnrey@email.com',
                'phonenumber' => '1234567890',
                'specialization' => 'Cardio',
            ],
            [
                'firstname' => 'Adok',
                'lastname' => 'Alicante',
                'email' => 'alicantadok@email.com',
                'phonenumber' => '0987654321',
                'specialization' => 'Strength Training',
            ],
        ];

        foreach ($coaches as $coach) {
            Coach::table('coaches')->insert($coach);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
