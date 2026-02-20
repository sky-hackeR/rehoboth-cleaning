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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();

            $table->string('customer_name');
            $table->string('email');
            $table->string('phone');

            // Foreign Keys
            $table->foreignId('service_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('location_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->integer('sq_ft')->nullable();
            $table->decimal('estimated_price', 10, 2)->nullable();

            $table->string('status')->default('pending'); 
            // pending, sent, closed, lost

            $table->string('source'); 
            // website or whatsapp

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
