<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');

            $table->string('reviewTitle');
            $table->string('email', 100);
            $table->text('reviewDesc');
            $table->string('pros')->nullable();
            $table->string('cons')->nullable();
            $table->float('rating', 3, 2);
            $table->integer('userId')->unsigned();
            $table->integer('productId');
            $table->string('productName')->nullable();
            $table->string('status')->nullable();
            $table->boolean('verified')->default(0);
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
        Schema::dropIfExists('reviews');
    }
}
