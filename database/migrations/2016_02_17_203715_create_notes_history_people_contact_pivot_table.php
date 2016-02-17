<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesHistoryPeopleContactPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes_history_people_contact', function (Blueprint $table) {
            $table->integer('notes_history_id')->unsigned()->index();
            $table->foreign('notes_history_id')->references('id')->on('notes_histories')->onDelete('cascade');
            $table->integer('people_contact_id')->unsigned()->index();
            $table->foreign('people_contact_id')->references('id')->on('people_contacts')->onDelete('cascade');
            $table->primary(['notes_history_id', 'people_contact_id'], 'people_note_history');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notes_history_people_contact');
    }
}
