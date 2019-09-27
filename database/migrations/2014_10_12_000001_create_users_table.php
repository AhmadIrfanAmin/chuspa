<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          
                $table->bigIncrements('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('image')->nullable();
                $table->string('email');
                $table->string('password');
                $table->integer('referred_count')->default(0);
                $table->enum('role',['vehicle boy','customer']);
                $table->string('contact');
                $table->string('home_address')->nullable();
                $table->integer('online')->default(0);
                $table->string('status')->default(1);
                $table->timestamp('email_verified_at')->nullable();
                $table->decimal('latitude', 10, 7)->nullable();
                $table->decimal('longitude', 10, 7)->nullable();
                $table->rememberToken();
                $table->timestamps();
                $table->unsignedBigInteger('customer_type');//->default(0);
                $table->foreign('customer_type')->references('id')->on('user_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
