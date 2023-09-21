<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSasaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sasaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kabupaten');
            $table->year('tahun');
            $table->double('bumil');
            $table->double('bulin');
            $table->double('lahir_hidup');
            $table->double('bayi');
            $table->double('balita');
            $table->double('bumil_resti');
            $table->double('bayi_resti');
            $table->timestamps();
            $table->foreign('id_kabupaten')->references('id')->on('kabupaten')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sasaran');
    }
}
