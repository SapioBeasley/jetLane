<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->integer('birthday_day');
            $table->integer('birthday_month');
            $table->integer('birthday_year');
            $table->string('gender');
            $table->string('address_street');
            $table->string('address_city');
            $table->string('address_state');
            $table->string('address_zip');
            $table->string('country');
            $table->string('home_phone');
            $table->string('business_phone');
            $table->string('mobile_phone');
            $table->string('other_phone');
            $table->string('fax');
            $table->string('email_1');
            $table->string('email_2');
            $table->string('email_3');
            $table->string('avatar');
            $table->string('tax_id');
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
        Schema::drop('people_contacts');
    }
}
