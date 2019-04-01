<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('values', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('attribute_id');
            $table->unsignedInteger('item_id');
            $table->string('value_text', 1024)->nullable();
            $table->mediumInteger('value_numerical')->nullable();
            $table->timestamp('value_timestamp')->nullable();
            $table->timestamps();

            $table->foreign('attribute_id')->references('id')->on('atributes');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('values');
    }
}
