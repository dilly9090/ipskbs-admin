<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul')->nullable();
            $table->text('pesan')->nullable();
            $table->datetime('tanggal')->nullable();
            $table->string('jam')->nullable();
            $table->integer('sender')->nullable();
            $table->integer('to')->nullable();
            $table->integer('seen_status')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifikasi');
    }
}
