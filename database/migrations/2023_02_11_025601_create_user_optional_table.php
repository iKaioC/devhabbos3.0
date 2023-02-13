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
        Schema::create('user_optional', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('optional_id');
            $table->string('product_type');
            $table->string('status');
            $table->string('pay');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('optional_id')->references('id')->on('optionals')->onDelete('cascade');

            $table->unique(['user_id', 'optional_id', 'product_type']);

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
        Schema::dropIfExists('user_optional');
    }
};
