<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('promo_code');
            $table->integer('discount_percentage')->default(0);
            $table->string('created_by')->nullable();
            $table->string('status');
            $table->integer('consume_count');
            $table->string('fk_user_type');
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
        Schema::dropIfExists('promo_discounts');
    }
}
