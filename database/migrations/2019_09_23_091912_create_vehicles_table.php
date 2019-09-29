<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('license_no');
            $table->string('front_image_url');
            $table->string('left_image_url');
            $table->string('right_image_url');
            $table->string('color');
            $table->string('licence_image_url');
            $table->string('license_plate_url');
            $table->string('rachet_strap1_url');
            $table->string('rachet_strap2_url');
            $table->string('rachet_strap3_url');
            $table->string('rachet_strap4_url');
            $table->string('bungee_cord1_url');
            $table->string('bungee_cord2_url');
            $table->string('moving_blanket1_url');
            $table->string('moving_blanket2_url');
            $table->string('tarp_url');
            $table->timestamps();
            $table->unsignedBigInteger('fk_vehicle_type');
            $table->unsignedBigInteger('fk_driver_id');


            $table->foreign('fk_vehicle_type')
            ->references('id')->on('vehicle_types');
            $table->foreign('fk_driver_id')
            ->references('id')->on('users');
            //->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('vehicles', function (Blueprint $table) {

        //     // 1. Drop foreign key constraints
        //     $table->dropForeign(['store_id']);

        //     // 2. Drop the column
        //     $table->dropColumn('store_id');
        // });
    
        Schema::dropIfExists('vehicles');

    }
}
