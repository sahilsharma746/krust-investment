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
            $table->decimal('margin', 10, 10);
            $table->decimal('contract_size', 10, 10);
            $table->decimal('capital', 10, 10);
            $table->string('trade_type');
            $table->decimal('entry', 10, 10);
            $table->decimal('pnl', 10, 10);
            $table->decimal('fees', 10, 10);
            $table->string('order_type'); 
            $table->string('time_frame'); 
            $table->string('trade_result');
            $table->decimal('admin_trade_result_percentage');
            $table->decimal('trade_win_loss_amount', 10, 10);
            $table->tinyInteger('processed');
            $table->tinyInteger('status');
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
