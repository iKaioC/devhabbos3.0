<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_other_optional', function (Blueprint $table) {
            // Remove a chave estrangeira que se refere à coluna user_id
            $table->dropForeign(['user_id']);

            // Remove a restrição unique da coluna user_id
            $table->dropUnique(['user_id']);

            // Adicione novamente a restrição da chave estrangeira
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_other_optional', function (Blueprint $table) {
            // Remova a chave estrangeira novamente
            $table->dropForeign(['user_id']);

            // Adicione a restrição unique novamente
            $table->unique('user_id');

            // Adicione novamente a chave estrangeira
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }
};
