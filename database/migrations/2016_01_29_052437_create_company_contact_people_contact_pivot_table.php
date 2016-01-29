<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyContactPeopleContactPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_contact_people_contact', function (Blueprint $table) {
            $table->integer('company_contact_id')->unsigned()->index();
            $table->foreign('company_contact_id')->references('id')->on('company_contacts')->onDelete('cascade');
            $table->integer('people_contact_id')->unsigned()->index();
            $table->foreign('people_contact_id')->references('id')->on('people_contacts')->onDelete('cascade');
            $table->primary(['company_contact_id', 'people_contact_id'], 'company_people_contact');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company_contact_people_contact');
    }
}
