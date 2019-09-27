<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_url');
            $table->unsignedBigInteger('fk_order_id');
            $table->timestamps();
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
        Schema::dropIfExists('app_images');
    }
}
