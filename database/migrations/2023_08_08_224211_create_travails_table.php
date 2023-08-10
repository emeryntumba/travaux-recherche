<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travails', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->string('auteur');
            $table->string('theme');
            $table->string('directeur');
            $table->string('encadreur');
            $table->enum('type_travail', ['TFC', 'TFE', 'RS', 'DEA', 'THESE']);
            $table->date('annee_publication');
            $table->string('file');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('travails');
    }
};
