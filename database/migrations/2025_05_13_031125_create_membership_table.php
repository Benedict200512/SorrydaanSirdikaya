<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Membership;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('membership_status');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });

        // Seed some example memberships
        $memberships = [
            [
                'membership_status' => 'active',
                'start_date' => now()->startOfMonth()->toDateString(),
                'end_date' => now()->addMonth()->endOfMonth()->toDateString(),
                'price' => 4999.99,
            ],
            [
                'membership_status' => 'expired',
                'start_date' => now()->subMonths(2)->startOfMonth()->toDateString(),
                'end_date' => now()->subMonth()->endOfMonth()->toDateString(),
                'price' => 3999.99,
            ],
        ];

        foreach ($memberships as $membership) {
            Membership::create($membership);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
