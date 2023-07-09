<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenTatakelolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_tatakelola', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dokumen_id');
            $table->string('path');
            $table->string('filename');
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('dokumen_id')->references('id')->on('aplikasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_tatakelola');
    }
}
