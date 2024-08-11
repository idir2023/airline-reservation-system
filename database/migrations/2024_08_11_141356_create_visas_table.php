<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->string('type_visa'); // Type de visa
            $table->string('destination_visa'); // Destination du visa
            $table->string('motif'); // Motif du visa
            $table->text('description')->nullable(); // Description (peut être null)
            $table->string('pdf_path')->nullable()->default('');
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
        Schema::dropIfExists('visas');
    }
};
