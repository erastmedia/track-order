<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produksi', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->bigInteger('id_receive');
            // $table->foreign('id_receive')->references('id')->on('receive')->onDelete('cascade');
            $table->string('kodeitem', 50);
            $table->unsignedBigInteger('id_jenis_order');
            $table->foreign('id_jenis_order')->references('id')->on('jenis_order_produksi')->onDelete('cascade');
            $table->string('pcs', 10);
            $table->date('tglkirim');
            $table->date('tglkirimbaru');
            $table->date('tglkirimbed');
            $table->date('tgldelivery');

            $table->integer('hair');    /* 0 : - | 1 : WAITING } 2 : IN PROGRESS | 3 : READY */
            $table->integer('base');    /* 0 : - | 1 : WAITING } 2 : IN PROGRESS | 3 : READY */
            $table->integer('venting'); /* 0 : - | 1 : WAITING } 2 : IN PROGRESS | 3 : READY */
            $table->integer('final');   /* 0 : - | 1 : COATING } 2 : PACKING | 3 : SHIPPED */

            $table->double('cost');
            $table->integer('flagapproval');
            $table->date('tglapproval');
            $table->integer('qty');
            $table->integer('flagkirimbuyer');
            $table->integer('flagproses');
            $table->timestamps();

            $table->primary('id');
            $table->index('kodeitem');
            $table->index('hair');
            $table->index('base');
            $table->index('venting');
            $table->index('final');
            $table->index('flagapproval');
            $table->index('flagkirimbuyer');
            $table->index('flagproses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produksi');
    }
}
