<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysBankAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_bank_account', function (Blueprint $table) {
            $table->bigIncrements('sys_bank_id');

            $table->string('sys_bank_name');

            $table->string('sys_bank_account_num');

            $table->boolean('state')->default(0);

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
        Schema::dropIfExists('sys_bank_account');
    }
}
