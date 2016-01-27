<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimingTemplateTransactionPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timing_template_transaction', function (Blueprint $table) {
            $table->integer('timing_template_id')->unsigned()->index();
            $table->foreign('timing_template_id')->references('id')->on('timing_template')->onDelete('cascade');
            $table->integer('transaction_id')->unsigned()->index();
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->primary(['timing_template_id', 'transaction_id'], 'trans_template_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('timing_template_transaction');
    }
}
