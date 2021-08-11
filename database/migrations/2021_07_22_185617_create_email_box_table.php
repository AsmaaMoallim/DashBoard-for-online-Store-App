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
            $table->id()->autoIncrement();

            $table->foreignId('sys_email_id')
                ->nullable($value = false)
                ->constrained('sys_info_email')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('email_cla_name');
            $table->string('email_cla_email');

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
