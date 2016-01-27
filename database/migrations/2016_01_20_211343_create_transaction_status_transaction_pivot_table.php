<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionStatusTransactionPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_status_transaction', function (Blueprint $table) {
            $table->integer('transaction_status_id')->unsigned()->index();
            $table->foreign('transaction_status_id')->references('id')->on('transaction_status')->onDelete('cascade');
            $table->integer('transaction_id')->unsigned()->index();
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->primary(['transaction_status_id', 'transaction_id'], 'trans_status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction_status_transaction');
    }
}
