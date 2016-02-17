<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanPeopleContactPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_people_contact', function (Blueprint $table) {
            $table->integer('loan_id')->unsigned()->index();
            $table->foreign('loan_id')->references('id')->on('loans')->onDelete('cascade');
            $table->integer('people_contact_id')->unsigned()->index();
            $table->foreign('people_contact_id')->references('id')->on('people_contacts')->onDelete('cascade');
            $table->primary(['loan_id', 'people_contact_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('loan_people_contact');
    }
}
