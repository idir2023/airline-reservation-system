<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('assurance_formulaires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assurance_id'); // Foreign key to consultation table
            $table->string('nom');
            $table->string('prenom');
            $table->text('description');
            $table->string('numerTele');
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('assurance_id')->references('id')->on('assurances')->onDelete('cascade');        });
    }
};
