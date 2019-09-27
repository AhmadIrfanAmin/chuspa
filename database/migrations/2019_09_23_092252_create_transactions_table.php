<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount');
            $table->string('status');
            //$table->unsignedBigInteger('fk_customer_id');
            $table->unsignedBigInteger('fk_order_id');
            //$table->unsignedBigInteger('fk_vehicle_boy_id');
            $table->timestamps();
            //$table->foreign('fk_customer_id')
            //->references('id')->on('users');
             $table->foreign('fk_order_id')
             ->references('id')->on('orders');
            // $table->foreign('fk_vehicle_boy_id')
            // ->references('id')->on('users');
        });
        // Schema::table('transactions', function($table)
        // {
        //      $table->foreign('fk_customer_id')
        //     ->references('id')->on('users');
        //     $table->foreign('fk_order_id')
        //     ->references('id')->on('orders');
        //     $table->foreign('fk_vehicle_boy_id')
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
        Schema::dropIfExists('transactions');
    }
}
