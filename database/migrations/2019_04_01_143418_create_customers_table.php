<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('first_name', 128);
            $table->string('last_name', 128);
            $table->enum('sex', ['m','f']);
            $table->unsignedInteger('delivery_address_id')->nullable();
            $table->unsignedInteger('billing_address_id')->nullable();
            $table->string('email', 128)->nullable();
            $table->string('phone', 64)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('delivery_address_id')->references('id')->on('addresses');
            $table->foreign('billing_address_id')->references('id')->on('addresses');
        });
    }
    /*  id int
      UUID UUID
      first_name varchar
      last_name varchar
      sex varchar
      delivery_address_id int
      belling_address_id int
      email varchar
      phone varchar
      softDeletes timestamp*/
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
