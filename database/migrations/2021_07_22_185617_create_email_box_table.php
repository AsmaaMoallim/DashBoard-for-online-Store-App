<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailBoxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_box', function (Blueprint $table) {
            $table->bigIncrements('email_box_id');

            $table->foreignId('sys_email_id')
                ->references('sys_email_id')
                ->on('sys_info_email')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('email_cla_name');
            $table->string('email_cla_email');
            $table->string('email_cla_phone');
            $table->string('email_type');

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
        Schema::dropIfExists('email_box');
    }
}
