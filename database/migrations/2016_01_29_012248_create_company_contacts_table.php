<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('dba');
            $table->string('organization');
            $table->string('address_street');
            $table->string('address_city');
            $table->string('address_state');
            $table->string('address_zip');
            $table->string('country');
            $table->string('phone');
            $table->string('mobile_phone');
            $table->string('other_phone');
            $table->string('fax');
            $table->string('email_1');
            $table->string('email_2');
            $table->string('email_3');
            $table->string('website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company_contacts');
    }
}
