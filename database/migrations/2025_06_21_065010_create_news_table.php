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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('publisher');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('content');
            $table->string('category');
            $table->bigInteger('jumlah_view')->default(0);
            // date
            $table->date('published_at');
            // time published
            $table->time('published_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
