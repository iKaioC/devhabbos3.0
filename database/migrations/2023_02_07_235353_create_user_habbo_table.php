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
        Schema::create('user_habbo', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('habbo_id');
            $table->string('product_type');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('habbo_id')->references('id')->on('habbos')->onDelete('cascade');

            $table->unique(['user_id', 'habbo_id', 'product_type']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_habbo');
    }
};
