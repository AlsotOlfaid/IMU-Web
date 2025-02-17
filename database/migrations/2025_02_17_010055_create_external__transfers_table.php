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
        Schema::create('external_transfers', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount');
            $table->string('reason');
            $table->string('target_account');
            $table->string('target_bank');
            $table->date('movement_date');
            $table->foreignId('account_id')
                  ->constrained('accounts')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_transfers');
    }
};
