<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('nomcomplet');
            $table->date('datededepot');
            $table->unsignedBigInteger('lieu_depot_id');
            $table->date('dateReponse')->nullable();
            $table->boolean('accordounon');
            $table->text('description');
            $table->timestamps();
            $table->foreign('lieu_depot_id')->references('id')->on('lieu_depots')->onDelete('cascade');
        });
        
        
    }
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
