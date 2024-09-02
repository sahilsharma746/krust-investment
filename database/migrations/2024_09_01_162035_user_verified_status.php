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
        if (!Schema::hasTable('user_verified_status')) {
            Schema::create('user_verified_status', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('user_id'); // Assuming user_id is a foreign key referencing the users table
                $table->enum('kyc_verify_status', ['pending', 'verified', 'rejected']); // Using enum for fixed set of values
                $table->enum('email_verify_status', ['pending', 'verified', 'rejected']);
                $table->enum('phone_verify_status', ['pending', 'verified', 'rejected']);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_account_types');
    }
};
