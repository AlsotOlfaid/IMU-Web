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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('minimum_payment');
            $table->decimal('interestfree_amount');
            $table->decimal('total_amount');
            $table->date('cut_date');
            $table->date('payment_date');
            $table->date('movement_date');
            $table->foreignId('card_id')
                  ->constrained('credit_cards')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
