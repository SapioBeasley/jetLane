<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyCategoryCompanyContactPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_category_company_contact', function (Blueprint $table) {
            $table->integer('company_category_id')->unsigned()->index();
            $table->foreign('company_category_id')->references('id')->on('company_categories')->onDelete('cascade');
            $table->integer('company_contact_id')->unsigned()->index();
            $table->foreign('company_contact_id')->references('id')->on('company_contacts')->onDelete('cascade');
            $table->primary(['company_category_id', 'company_contact_id'], 'company_contact_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company_category_company_contact');
    }
}
