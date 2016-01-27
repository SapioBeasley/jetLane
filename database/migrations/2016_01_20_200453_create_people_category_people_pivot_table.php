<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleCategoryPeoplePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_category_people', function (Blueprint $table) {
            $table->integer('people_category_id')->unsigned()->index();
            $table->foreign('people_category_id')->references('id')->on('people_categories')->onDelete('cascade');
            $table->integer('people_id')->unsigned()->index();
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->primary(['people_category_id', 'people_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('people_category_people');
    }
}
