<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Track which user left the review
            $table->integer('rating'); // Store rating (1-5)
            $table->text('comment'); // Store the review comment
            $table->timestamps(); // Store created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
