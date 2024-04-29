<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable();
            $table->string('kodebuyer', 3)->nullable();
            $table->integer('idmfreceive')->default(0);
            $table->date('tanggal')->nullable();
            $table->text('message')->nullable();
            $table->integer('lr')->default(0);
            $table->timestamps();
            $table->index('name');
            $table->index('kodebuyer');
            $table->index('idmfreceive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
