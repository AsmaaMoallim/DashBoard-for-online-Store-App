<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_sections', function (Blueprint $table) {
            $table->bigIncrements('main_id');

            $table->string('main_name')->unique();

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
        Schema::dropIfExists('main_sections');
    }
}
