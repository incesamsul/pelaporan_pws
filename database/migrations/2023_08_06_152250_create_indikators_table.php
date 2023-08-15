<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndikatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indikator', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('id_sasaran');
            $table->integer('bulan');
            $table->double('k1');
            $table->double('k4');
            $table->double('k6');
            $table->double('persalinan_oleh_nakes');
            $table->double('pn_di_fasyankes');
            $table->double('pn_di_non_fasyankes');
            $table->double('kunjungan_nifas_lengkap');
            $table->double('kn1');
            $table->double('kn_lengkap');
            $table->double('risti_masyarakat');
            $table->double('komplikasi_obsterti_ditangani');
            $table->double('neonatus_ditangani');
            $table->double('kby_lengkap');
            $table->double('balita_lengkap');
            $table->double('mtbs');
            $table->timestamps();
            $table->foreign('id_sasaran')->references('id')->on('sasaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indikator');
    }
}
