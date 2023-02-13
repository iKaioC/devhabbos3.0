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
        Schema::table('optionals', function (Blueprint $table) {
            $table->longText('icon')->after('price');
            $table->longText('color')->after('icon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('optionals', function (Blueprint $table) {
            $table->dropColumn('icon');
            $table->dropColumn('color');
        });
    }
};
