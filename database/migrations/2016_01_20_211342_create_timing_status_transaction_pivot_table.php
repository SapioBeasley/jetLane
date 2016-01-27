<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimingStatusTransactionPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timing_status_transaction', function (Blueprint $table) {
            $table->integer('timing_status_id')->unsigned()->index();
            $table->foreign('timing_status_id')->references('id')->on('timing_status')->onDelete('cascade');
            $table->integer('transaction_id')->unsigned()->index();
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->primary(['timing_status_id', 'transaction_id'], 'trans_timing_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('timing_status_transaction');
    }
}
