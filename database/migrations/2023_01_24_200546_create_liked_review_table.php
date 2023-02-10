<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liked_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->unsigned()->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('review_id')
                ->unsigned()->nullable()
                ->constrained('reviews')
                ->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('liked_reviews');
    }
};
