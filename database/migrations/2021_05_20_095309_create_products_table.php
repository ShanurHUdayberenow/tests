<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories');
            $table->unsignedBigInteger('subcategoryId');
            $table->foreign('subcategoryId')->references('id')->on('subcategories');
            $table->unsignedBigInteger('subsubcategoryId');
            $table->foreign('subsubcategoryId')->references('id')->on('subsubcategories');
            $table->string('name_tm', 100);
            $table->string('name_ru', 50);
            $table->string('images', 1000);
            $table->text('description_tm');
            $table->text('description_ru');
            $table->unsignedBigInteger('variationGroupId');
            $table->foreign('variationGroupId')->references('id')->on('variation_groups');
            $table->unsignedBigInteger('unitId');
            $table->foreign('unitId')->references('id')->on('units');
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
        Schema::dropIfExists('products');
    }
}
