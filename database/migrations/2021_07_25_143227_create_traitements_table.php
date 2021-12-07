<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraitementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traitements', function (Blueprint $table) {
            $table->foreignId('id_commande')->constrained('commandes');
            $table->boolean('confirmation')->default('false');
            $table->date('dateConfirmation')->nullable('true');
            $table->boolean('preparation')->default('false');
            $table->boolean('firstSend')->default('false');
            $table->date('dateFS')->nullable('true');
            $table->boolean('secondSend')->default('false');
            $table->date('dateSS')->nullable('true');
            $table->boolean('estLivre')->default('false');
            $table->date('dateEL')->nullable('true');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traitements');
    }
}
