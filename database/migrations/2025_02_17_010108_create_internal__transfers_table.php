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
        Schema::create('internal_transfers', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount');
            $table->foreignId('origin_account_id')
                  ->constrained('accounts')
                  ->onDelete('cascade');

            $table->foreignId('target_account_id')
                  ->constrained('accounts')
                  ->onDelete('cascade');

            $table->date('movement_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_transfers');
    }
};
