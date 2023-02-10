<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('image');
            $table->double('rating');
            $table->foreignId('author_id')
                ->unsigned()->nullable()
                ->constrained('authors')
                ->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('owner_id')
                ->unsigned()->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('reader_id')
                ->unsigned()->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('genre_id')
                ->unsigned()->nullable()
                ->constrained('genres')
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
        Schema::dropIfExists('books');
    }
};
