<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubPlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_planets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("sid");
            $table->string("mtitle");
            $table->string("fmodule")->default("false");
            $table->unsignedInteger("total");
            $table->string("status")->default('lock');
            $table->unsignedInteger("planet_id");
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
        Schema::dropIfExists('sub_planets');
    }
}
