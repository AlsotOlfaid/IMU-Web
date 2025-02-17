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
        Schema::create('section_movements', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount');
            $table->string('section_name');
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
        Schema::dropIfExists('section_movements');
    }
};
