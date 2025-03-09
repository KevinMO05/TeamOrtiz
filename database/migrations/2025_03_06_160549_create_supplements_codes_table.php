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
        Schema::create('supplements_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplements_id')->constrained('supplements');
            $table->string('code'); 
            $table->date('purchase_date');
            $table->date('expiration_date');
            $table->enum('state', ['Dañado', 'Disponible', 'Vendido']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplements_codes');
    }
};
