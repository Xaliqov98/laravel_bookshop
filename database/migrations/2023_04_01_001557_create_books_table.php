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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book');
            $table->string('code');
            $table->integer('page');
            $table->integer('stock');
            $table->string('binding');
            $table->string('price');
            $table->string('r_price');
            $table->string('buy_price');
            $table->string('discounted');
            $table->longtext('about');
            $table->string('language');
            $table->integer('author_id');
            $table->integer('category_id');
            $table->string('publish_id');
            $table->string('seller_id');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
