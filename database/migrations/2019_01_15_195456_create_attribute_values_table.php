<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_values', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value_text', 1024)->nullable();
            $table->mediumInteger('value_numerical')->nullable();
            $table->timestamp('value_timestamp')->nullable();
            $table->unsignedInteger('attribute_id');
            $table->unsignedInteger('item_id');
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
        Schema::dropIfExists('attribute_values');
    }
}
