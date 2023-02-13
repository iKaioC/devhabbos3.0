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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('memory');
            $table->string('vcpu');
            $table->string('type_storage');
            $table->string('amount_storage');
            $table->string('system');
            $table->string('locale');
            $table->string('price');
            $table->tinyInteger('stock')->default('1')->comment('1=instock,0=nostock');
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
        Schema::dropIfExists('servers');
    }
};
