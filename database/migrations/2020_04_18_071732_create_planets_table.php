<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pid")->default(0);
            $table->unsignedBigInteger("index")->default(0);
            $table->string("content")->nullable();
            $table->string("title");
            $table->string("type")->default("Single");
            $table->unsignedInteger("total")->default(0);
            $table->string("status")->default('lock');
            $table->unsignedInteger("course_id");
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
        Schema::dropIfExists('planets');
    }
}
