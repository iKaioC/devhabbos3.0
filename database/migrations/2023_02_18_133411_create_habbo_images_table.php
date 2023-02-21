<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habbo_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('habbo_id');
            $table->string('path');
            $table->timestamps();

            $table->foreign('habbo_id')->references('id')->on('habbos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habbo_images');
    }
};
