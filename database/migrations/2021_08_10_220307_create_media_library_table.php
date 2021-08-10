<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaLibraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_library', function (Blueprint $table) {
            $table->bigIncrements('medl_id');
            $table->string('medl_name');
            $table->string('medl_description');
            $table->binary('medl_img_ved');
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
        Schema::dropIfExists('media_library');
    }
}
