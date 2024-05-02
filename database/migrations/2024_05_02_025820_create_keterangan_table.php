<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeteranganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_receive');
            $table->integer('id_batch');
            $table->date('tgl1')->nullable();
            $table->text('comment1')->nullable();
            $table->date('tgl2')->nullable();
            $table->text('comment2')->nullable();
            $table->text('notes')->nullable();
            $table->date('tglmutakhir')->nullable();
            $table->timestamps();
            $table->index('id_batch');
            $table->index('tglmutakhir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keterangan');
    }
}
