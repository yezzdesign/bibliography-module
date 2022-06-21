<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booklinks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->string('link_amazon')->nullable();
            $table->string('link_lovelybooks')->nullable();
            $table->string('link_twitter')->nullable();
            $table->string('link_thalia')->nullable();
            $table->string('link_goodreads')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_other')->nullable();

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('book_id')->references('id')->on('bibliographies');



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
        Schema::dropIfExists('booklinks');
    }
};
