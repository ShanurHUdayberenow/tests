<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('mainCurrencySymbol', 10);
            $table->string('mainCurrencyCode', 10);
            $table->string('mainCurrencyName', 20);
            $table->string('mainCurrencyFractionalUnit', 10);
            $table->string('mainCurrencyFractionalSymbol', 10);
            $table->string('reportCurrencySymbol', 10);
            $table->string('reportCurrencyCode', 10);
            $table->string('reportCurrencyName', 20);
            $table->string('reportCurrencyFractionalUnit', 10);
            $table->string('reportCurrencyFractionalSymbol', 10);
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
        Schema::dropIfExists('settings');
    }
}
