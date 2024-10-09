<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id(); // id
            $table->string('name'); // name
            $table->text('desc'); // desc
            $table->integer('price'); // price
            $table->integer('duration'); // duration
            $table->timestamps(); // timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
