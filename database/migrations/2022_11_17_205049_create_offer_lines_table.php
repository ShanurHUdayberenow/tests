<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offerId');
            $table->unsignedBigInteger('productId');
            $table->double('price');
            $table->double('quantity');
            $table->foreign('offerId')->references('id')->on('offers');
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
        Schema::dropIfExists('offer_lines');
    }
}
