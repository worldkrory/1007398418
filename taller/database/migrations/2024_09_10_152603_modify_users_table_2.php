<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTable2 extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar las columnas innecesarias de la migracion default de laravel
            $table->dropColumn('id');
            $table->dropColumn('name');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Volver a agregar las columnas en caso de ser necesario revertir la migración
            $table->id();
            $table->string('name');
        });
    }
}

