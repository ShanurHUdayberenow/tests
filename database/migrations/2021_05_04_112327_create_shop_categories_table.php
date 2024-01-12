<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoryId');
            $table->unsignedBigInteger('subcategoryId');
            $table->unsignedBigInteger('subsubcategoryId');
            $table->unsignedBigInteger('shopId');
            $table->foreign('categoryId')->references('id')->on('categories');
            $table->foreign('subcategoryId')->references('id')->on('subcategories');
            $table->foreign('subsubcategoryId')->references('id')->on('subsubcategories');
            $table->foreign('shopId')->references('id')->on('shops');
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
        Schema::dropIfExists('shop_categories');
    }
}
