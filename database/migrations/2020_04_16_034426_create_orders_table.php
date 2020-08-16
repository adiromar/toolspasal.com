<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->date('order_date');
            $table->integer('shipping_details_id');
            $table->integer('payment_details_id');
            $table->smallinteger('order_status')->default(1);
            $table->integer('ordered_by')->nullable();
            $table->string('unique_order_identifier', 18);
            $table->unique('unique_order_identifier');

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
        Schema::dropIfExists('orders');
    }
}
