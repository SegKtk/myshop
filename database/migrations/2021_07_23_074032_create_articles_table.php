<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nom');
            $table->double('prix');
            $table->text('description')->nullable('true');
            $table->integer('qte_stock');
            $table->string('photo1')->nullable('true');
            $table->string('photo2')->nullable('true');
            $table->foreignId('id_categorie')->constrained('categories');
            $table->foreignId('id_typeArticle')->constrained('type_articles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
