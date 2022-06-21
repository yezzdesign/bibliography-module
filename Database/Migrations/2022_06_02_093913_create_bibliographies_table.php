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
        Schema::create('bibliographies', function (Blueprint $table) {
            $table->id();
            $table->timestamp('read_at')->nullable();
            $table->string('book_title');
            $table->string('book_author');
            $table->string('book_cover')->nullable();
            $table->text('book_blurb')->nullable();
            $table->boolean('book_status')->default(false);

            $table->unsignedBigInteger('post_id')->nullable();
            $table->timestamps();


            $table->foreign('post_id')->references('id')->on('posts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bibliographies');
    }
};
