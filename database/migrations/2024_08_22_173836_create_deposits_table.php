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
        if (!Schema::hasTable('deposits')) {
            Schema::create('deposits', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('getway_id')->nullable(); // Make getway_id nullable
                $table->string('payment_method');
                $table->string('wallet_address');
                $table->string('address_tag')->nullable();
                $table->float('amount');
                $table->string('receipt')->nullable(); // Make receipt nullable
                $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
                $table->string('remarks')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
