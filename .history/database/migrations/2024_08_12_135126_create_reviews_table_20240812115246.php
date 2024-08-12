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
            $table->date('dateReponse')->nullable();
            $table->boolean('accordounon');
            $table->text('description');
            $table->timestamps();
           
        });
    }
};

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('nomcomplet');
            $table->date('datededepot');
            $table->date('dateReponse')->nullable();
            $table->boolean('accordounon');
            $table->text('description');
            $table->timestamps();
        });
    }

    
}
