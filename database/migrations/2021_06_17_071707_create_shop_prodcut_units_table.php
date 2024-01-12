<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopProdcutUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_prodcut_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('shopProductId');
            $table->unsignedInteger('unitId');
            $table->double('price');
            $table->double('multiply');
            $table->boolean('isDouble');
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
        Schema::dropIfExists('shop_prodcut_units');
    }
}
