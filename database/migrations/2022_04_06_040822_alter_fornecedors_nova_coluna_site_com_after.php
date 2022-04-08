<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedorsNovaColunaSiteComAfter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fornecedors', function (Blueprint $table) {
            $table->string('site', 150)->after('nome');
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
            // Deletar colunas da tabela produtos
            $table->dropColumn('site');
        });
    }
}
