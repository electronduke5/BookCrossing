<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('book_rating');
        });
    }


    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('book_rating');
        });
    }
};
