<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string("Nom");
            $table->string("Nom_pere");
            $table->string("Nom_mere");
            $table->string("tel_pere");
            $table->string("tel_mere");
            $table->string("email_pere");
            $table->string("email_mere");
            $table->string("sexe");
            $table->string("date_naissance");
            $table->string("photo");
            //$table->foreignId('classe_id')->constrained();
            $table->unsignedBigInteger('classe_id')->nullable();// ! ! ! THIS STRING ! ! !
            $table->foreign('classe_id')->references('id')->on('classes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
