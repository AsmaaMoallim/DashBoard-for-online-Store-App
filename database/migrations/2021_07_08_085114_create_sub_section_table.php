<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_section', function (Blueprint $table) {
            $table->bigIncrements('sub_id');

            $table->string('sub_name');

            $table->foreignId('main_id')
                ->nullable($value = false)
                ->constrained('main_sections')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('medl_id')
                ->nullable($value = false)
                ->constrained('media_library')
                ->onUpdate('cascade')
                ->onDelete('cascade');


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
        Schema::dropIfExists('sub_section');
    }
}
