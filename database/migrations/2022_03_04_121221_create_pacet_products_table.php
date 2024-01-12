<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacetProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacet_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pacetId');
            $table->foreign('pacetId')->references('id')->on('pacets');
            $table->unsignedBigInteger('productId');
            $table->foreign('productId')->references('id')->on('products');
            $table->unsignedBigInteger('attributeId');
            $table->foreign('attributeId')->references('id')->on('attributes');
            $table->string('quantity', 50);
            $table->string('price', 50);
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
        Schema::dropIfExists('pacet_products');
    }
}
