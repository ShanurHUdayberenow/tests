<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attributeId');
            $table->unsignedBigInteger('attributeValueId');
            $table->unsignedBigInteger('productId');
            $table->foreign('attributeId')->references('id')->on('attributes');
            $table->foreign('attributeValueId')->references('id')->on('attribute_values');
            $table->foreign('productId')->references('id')->on('products');
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
        Schema::dropIfExists('spetifications');
    }
}
