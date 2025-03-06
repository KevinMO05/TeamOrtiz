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
        Schema::create('maintenance_machines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_code_id')->constrained('machine_codes');
            $table->date('last_maintenance_date');
            $table->date('next_maintenance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_machines');
    }
};
