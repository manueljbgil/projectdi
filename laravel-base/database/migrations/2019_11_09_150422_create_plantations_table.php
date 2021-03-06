<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->date('planted_at')->nullable();
            $table->mediumText('description')->nullable();
            //foreignkey
            $table->bigInteger('backyard_id')->unsigned();
            $table->bigInteger('type_id')->unsigned();
            $table->foreign('backyard_id')->references('id')->on('backyards');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantations');
    }
}
