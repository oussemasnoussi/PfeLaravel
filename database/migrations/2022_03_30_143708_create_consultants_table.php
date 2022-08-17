<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->id();

            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->integer('cin');
            $table->string('email')->unique();
            $table->integer('tel');
            $table->string('date_naiss');
            $table->foreign('role_id')->references('id')->on('role');

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
        Schema::dropIfExists('consultants');
    }
}
