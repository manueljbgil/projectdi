<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreeLibsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_libs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('image');
            //foreign
            $table->bigInteger('tree_id')->unsigned();
            $table->foreign('tree_id')->references('id')->on('trees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tree_libs');
    }
}
