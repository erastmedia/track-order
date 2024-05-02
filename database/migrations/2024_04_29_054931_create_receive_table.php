<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receive', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('nomororder', 50);
            $table->string('customer_name', 100)->nullable();
            $table->unsignedBigInteger('id_buyer');
            // $table->foreign('id_buyer')->references('id')->on('buyer')->onDelete('cascade');
            $table->unsignedBigInteger('id_jenis_order');
            $table->foreign('id_jenis_order')->references('id')->on('jenis_order')->onDelete('cascade');
            $table->integer('qty');
            $table->date('tglorder');
            $table->date('tglmasuk');
            $table->integer('flagproses');
            $table->integer('flagkirimbuyer');
            $table->integer('status');
            $table->timestamps();
            $table->primary('id');
            $table->index('nomororder');
            $table->index('customer_name');
            $table->index('tglorder');
            $table->index('flagproses');
            $table->index('flagkirimbuyer');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receive');
    }
}
