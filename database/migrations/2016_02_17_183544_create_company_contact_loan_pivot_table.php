<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyContactLoanPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_contact_loan', function (Blueprint $table) {
            $table->integer('company_contact_id')->unsigned()->index();
            $table->foreign('company_contact_id')->references('id')->on('company_contacts')->onDelete('cascade');
            $table->integer('loan_id')->unsigned()->index();
            $table->foreign('loan_id')->references('id')->on('loans')->onDelete('cascade');
            $table->primary(['company_contact_id', 'loan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company_contact_loan');
    }
}
