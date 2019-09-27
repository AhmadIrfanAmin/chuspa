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
            $table->string('status');
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
           
            $table->decimal('pickup_lat', 10, 7);
            $table->decimal('pickup_long', 10, 7);
            $table->decimal('dropoff_lat', 10, 7);
            $table->decimal('dropoff_long', 10, 7);

            $table->unsignedBigInteger('fk_promo_id');
            $table->unsignedBigInteger('fk_customer_id');
            $table->unsignedBigInteger('fk_driver_id');
            
            $table->timestamps();


             $table->foreign('fk_promo_id')
             ->references('id')->on('promo_discounts');
             $table->foreign('fk_customer_id')
             ->references('id')->on('users');
             $table->foreign('fk_driver_id')
             ->references('id')->on('users');
        });
        // Schema::table('orders', function($table)
        // {
            
        //     //$table->foreign('fk_promo_id')
        //     //->references('id')->on('promo_discounts');
        //     $table->foreign('fk_customer_id')
        //     ->references('id')->on('users');
        //     $table->foreign('fk_driver_id')
        //     ->references('id')->on('users');
        // });
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
