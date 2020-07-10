<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->text('apellido1');
            $table->text('apellido2');
            $table->text('nombre');
            $table->text('estado');
            $table->date('fecha_ingreso');
            $table->text('licenciatura');
            $table->text('licenciatura1');
            $table->text('licenciatura2');
            $table->text('maestria');
            $table->text('maestria1');
            $table->text('maestria2');
            $table->text('doctorado');
            $table->text('doctorado1');
            $table->text('doctorado2');
            $table->text('tipo_de_contratacion');
            $table->string('email',30)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('changedpassword')->default(0);
            $table->string('password');
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
        Schema::dropIfExists('docentes');
    }
}
