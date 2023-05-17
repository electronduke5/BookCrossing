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
        Schema::create('pick_up_points', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('street')->nullable();
            $table->string('house')->nullable();
            $table->string('flat')->nullable();
            $table->string('comment')->nullable();
            $table->foreignId('user_id')
                ->unsigned()->nullable()
                ->constrained('users')
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
        Schema::dropIfExists('pick_up_points');
    }
};