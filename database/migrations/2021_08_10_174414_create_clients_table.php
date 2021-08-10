<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\Utilities\Config;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('cla_id');

            $table->string('cla_frist_name');
            $table->string('cla_last_name');
            $table->binary('cla_img')->nullable();
            $table->string('cla_phone_num')->unique();
            $table->string('cla_email')->unique();
            $table->tinyInteger('state')->default(0);
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
        Schema::dropIfExists('clients');
    }
}
