<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinnersTable extends Migration
{
    public function up()
    {
        Schema::create('winners', function (Blueprint $table) {
            $table->string('name');
            $table->string('email');
            $table->string('city');
            $table->string('country');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('winners');
    }
}
