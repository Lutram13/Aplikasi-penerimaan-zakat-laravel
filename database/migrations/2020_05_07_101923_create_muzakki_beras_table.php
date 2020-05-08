<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuzakkiBerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muzakki_beras', function (Blueprint $table) {
            $table->id();
            $table->string('nama',200);
            $table->string('alamat',200);
            $table->string('rt',5);
            $table->integer('jumlahBeras');
            $table->string('keterangan',200)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('muzakki_beras');
    }
}
