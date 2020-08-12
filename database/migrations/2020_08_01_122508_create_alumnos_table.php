<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->text('apellido1');
            $table->text('apellido2');
            $table->text('nombre');
            $table->string('matricula',15);
            $table->text('sexo');
            $table->text('curp');

            $table->unsignedBigInteger('licenciatura_id');
            $table->foreign('licenciatura_id')->references('id')->on('licenciaturas')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')->on('grupos')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->string('email',30);
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('changedpassword')->default(0);
            $table->string('password');
            $table->unique('matricula', 'email');
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
        Schema::dropIfExists('alumnos');
    }
}
