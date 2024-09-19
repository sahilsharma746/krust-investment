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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('asset');
            $table->string('name');
            $table->decimal('margin');
            $table->decimal('contract_size');
            $table->decimal('capital');
            $table->string('trade_type');
            $table->decimal('entry');
            $table->decimal('pnl'); 
            $table->decimal('fees'); 
            $table->string('order_type'); 
            $table->string('time_frame'); 
            $table->string('trade_result');
            $table->decimal('admin_trade_result_percentage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
