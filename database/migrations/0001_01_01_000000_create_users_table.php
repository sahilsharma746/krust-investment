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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('username');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->enum('role', array('admin', 'user'))->default('user');
                $table->enum('status', array('active', 'deactive', 'baned'))->default('active');
                $table->string('account_type');
                $table->string('phone')->nullable();
                $table->string('referal_id')->nullable();
                $table->float('balance')->default(0);
                $table->string('avatar')->default('uploads/avatar.png');
                $table->rememberToken();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('password_reset_tokens')) {
            Schema::create('password_reset_tokens', function (Blueprint $table) {
                $table->string('email', 191)->primary();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }

        if (!Schema::hasTable('sessions')) {
            Schema::create('sessions', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->ipAddress('ip_address')->nullable();
                $table->text('user_agent')->nullable();
                $table->longText('payload');
                $table->integer('last_activity');
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
