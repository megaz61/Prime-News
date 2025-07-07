<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id("id");
            $table->bigInteger("news_id")->nullable();
            $table->string("fullname")->nullable();
            $table->string("email");
            $table->string("password");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("writer")->nullable();
            $table->timestamp("email_verified_at")->nullable();
            // get ip address
            $table->string("ip_address")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
