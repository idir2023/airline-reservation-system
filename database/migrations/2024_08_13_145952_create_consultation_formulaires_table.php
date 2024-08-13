<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationFormulairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultation_formulaires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consultation_id'); // Foreign key to consultation table
            $table->string('nom');
            $table->string('prenom');
            $table->text('description');
            $table->string('numerTele');
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('consultation_id')->references('id')->on('consultations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultation_formulaires');
    }
}
