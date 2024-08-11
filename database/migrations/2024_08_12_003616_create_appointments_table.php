<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->date('date');            // Column for the date of the rendezvous
            $table->string('title');         // Column for the title of the rendezvous
            $table->text('description');     // Column for the description of the rendezvous
            $table->timestamps();
        });
    }
};
