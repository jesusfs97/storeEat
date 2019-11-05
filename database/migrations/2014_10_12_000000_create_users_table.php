<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * Esta migracion tiede dos metodos el metodo UP
     */
    public function up() // se utiliza para agregar tablas a la base de datos
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // Esto creara un Entero que sea Autoincremental
            $table->string('name')->nullable();
            $table->string('email')->unique(); // esto ara que el email sea unico en la base de datos
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Hace lo contrario al metodo UP.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
