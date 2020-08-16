<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('productName');
            $table->string('slug');
            $table->string('unit');
            $table->float('rate', 10, 2);
            $table->integer('categoryId');
            $table->string('categoryName');
            $table->integer('availableItems')->nullable();
            $table->integer('parentId')->default(0);
            $table->string('featuredImage');
            $table->text('shortDesc');
            $table->text('highlights')->nullable();
            $table->text('description')->nullable();
            $table->date('entryDate');
            $table->integer('quantity')->default(0);
            $table->boolean('featured')->default(0);
            $table->integer('user_id')->unsigned();
            $table->boolean('newProduct')->default(0);
            $table->string('discountPercent')->nullable();
            $table->integer('actualRate');
            $table->string('merchantId');
            $table->integer('nosReview')->default(0);
            $table->float('avgRating', 8, 3);
            $table->integer('totalSoldQuantity')->default(0);
            $table->string('productTags')->nullable();
            
            $table->text('keywords')->nullable();

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
        Schema::dropIfExists('products');
    }
}
