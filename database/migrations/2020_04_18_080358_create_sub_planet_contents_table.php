<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubPlanetContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_planet_contents', function (Blueprint $table) {
            $table->id();

            $table->string("mid");
            $table->string("bookmark")->default("false");
            $table->string("name");

            $table->string("des_01")->default("null");
            $table->string("link01")->default("null");
            $table->string("des_02")->default("null");
            $table->string("link02")->default("null");
            $table->string("code")->default("code block");
            $table->string("output")->default("null");
            $table->string("des_03")->default("null");
            $table->string("qtype")->default("normal");
            $table->string("finish")->default("false");
            $table->integer("mark")->default(0);
            $table->string("status")->default("false");
            $table->string("blankstype")->default("null");

            $table->unsignedInteger("sub_planet_id");

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
        Schema::dropIfExists('sub_planet_contents');
    }
}
