<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssurancesTable extends Migration
{
    public function up()
    {
        Schema::create('assurances', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable(); // Optional image field
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assurances');
    }
}
