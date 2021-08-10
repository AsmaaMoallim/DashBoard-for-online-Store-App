<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\Utilities\Config;

class CreateBankTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_transaction', function (Blueprint $table) {
            $table->bigIncrements('trans_id');

            $table->foreignId('ord_id')
                ->nullable($value = false)
                ->constrained('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('cla_id')
                ->nullable($value = false)
                ->constrained('clients')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('sys_bank_id')
                ->nullable($value = false)
                ->constrained('sys_bank_account')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->float('banktran_amount');
            $table->binary('banktran_img');
            $table->integer('fakeId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_transaction');
    }
}
