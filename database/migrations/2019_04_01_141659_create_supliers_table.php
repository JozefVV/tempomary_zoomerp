<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supliers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('delivery_address_id');
            $table->unsignedInteger('billing_address_id');
            $table->string('ICO', 15);
            $table->string('IBAN', 34);
            $table->string('email', 128);
            $table->string('phone', 128)->nullable();
            $table->string('web', 128)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('delivery_address_id')->references('id')->on('addresses');
            $table->foreign('billing_address_id')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supliers');
    }
}
