<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pickup_date');
            $table->string('pickup_time');
            $table->string('item_photo_url');
            $table->unsignedBigInteger('fk_order_id');
            $table->unsignedBigInteger('fk_customer_id');
            $table->timestamps();
            $table->foreign('fk_customer_id')
            ->references('id')->on('users');
            $table->foreign('fk_order_id')
            ->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
