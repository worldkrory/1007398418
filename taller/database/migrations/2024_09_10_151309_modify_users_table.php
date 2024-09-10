<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar las columnas innecesarias de la migracion default de laravel
            $table->dropid();
            $table->dropColumn('name');
            $table->dropColumn('email_verified_at');
            $table->dropRememberToken();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Volver a agregar las columnas en caso de ser necesario revertir la migración
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
        });
    }
}

