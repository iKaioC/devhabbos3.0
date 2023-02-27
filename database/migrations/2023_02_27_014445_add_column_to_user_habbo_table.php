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
        Schema::table('user_habbo', function (Blueprint $table) {
            $table->string('pay')->after('status');
            $table->timestamp('supportdate')->after('pay');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_habbo', function (Blueprint $table) {
            $table->dropColumn('pay');
            $table->dropColumn('supportdate');
        });
    }
};
