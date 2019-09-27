<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refer_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->unsignedBigInteger('fk_promo_id');
            $table->unsignedBigInteger('fk_sender_id');
            $table->unsignedBigInteger('fk_receiver_id');
            $table->timestamps();
            //$table->foreign('fk_promo_id')
            //->references('id')->on('promo_discounts');
            $table->foreign('fk_sender_id')
            ->references('id')->on('users');
            $table->foreign('fk_receiver_id')
            ->references('id')->on('users');
        });
        // Schema::table('refer_users', function($table)
        // {
            
        //     $table->foreign('fk_promo_id')
        //     ->references('id')->on('promo_discounts');
        //     $table->foreign('fk_sender_id')
        //     ->references('id')->on('users');
        //     $table->foreign('fk_receiver_id')
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
        Schema::dropIfExists('refer_users');
    }
}
