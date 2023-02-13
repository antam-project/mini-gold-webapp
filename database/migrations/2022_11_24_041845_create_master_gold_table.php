<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_gold', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->double('weight');
            $table->double('price1')->comment('Base Price');
            $table->double('price2')->comment('Price with NPWP (0.45%)');
            $table->double('price3')->comment('Price with NPWP (0.90%)');
            $table->string('source');
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
        Schema::dropIfExists('master_gold');
    }
};
