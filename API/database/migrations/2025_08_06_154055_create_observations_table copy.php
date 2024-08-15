<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservationsTable extends Migration
{
    public function up()
    {
        Schema::create('observations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categories_id')->constrained('categories');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('observations');
    }
}
