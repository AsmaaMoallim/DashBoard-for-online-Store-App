<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasuresIndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measures_index', function (Blueprint $table) {
            $table->bigIncrements('mesu_index_id');
            $table->string('mesu_index_name')->unique();
            $table->binary('mesu_index_img');
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
        Schema::dropIfExists('measures_index');
    }
}
