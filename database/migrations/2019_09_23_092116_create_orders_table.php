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
            $table->bigIncrements('id');
            //$table->string('status');
            $table->enum('status',['pending','assigned','pickedup','address_not_found','driver_on_way','deliver_to_destination','other_reason']);
            $table->string('pickup');
            $table->string('dropoff');
            $table->decimal('trip_distance', 10, 4)->nullable();
            $table->string('load_unload_time');

            $table->integer('total_estimation')->nullable();
            $table->string('payment_mode');
            $table->integer('tip')->nullable();
            $table->string('city');
            $table->string('zip_code');
            $table->string('state');
            $table->string('country');
            $table->double('time');


            $table->string('pickup_lat');
            $table->string('pickup_long');
            $table->string('dropoff_lat');
            $table->string('dropoff_long');
            $table->unsignedBigInteger('fk_promo_id')->nullable();
            $table->unsignedBigInteger('fk_customer_id');
            $table->unsignedBigInteger('fk_driver_id')->nullable();
            
            $table->timestamps();


             $table->foreign('fk_promo_id')
             ->references('id')->on('promo_discounts');
             $table->foreign('fk_customer_id')
             ->references('id')->on('users');
             $table->foreign('fk_driver_id')
             ->references('id')->on('users');
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
