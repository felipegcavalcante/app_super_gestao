<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedorsNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fornecedors', function (Blueprint $table) {
            $table->string('nome', 50);
            $table->string('uf', 2);
            $table->string('email', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedors', function (Blueprint $table) {
            $table->dropColumn(['nome', 'uf', 'email']);
        });
    }
}
