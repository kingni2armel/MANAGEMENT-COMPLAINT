<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemarquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remarques', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('plaintes_id');
            $table->foreign('plaintes_id')->references('id')->on('plaintes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
             $table->string('numero_remarques');
             $table->boolean('statut_remarque');
             $table->string('commentaire_remarque');
             



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
        Schema::dropIfExists('remarques');
    }
}
