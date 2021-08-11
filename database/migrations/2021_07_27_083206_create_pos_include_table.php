<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosIncludeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_include', function (Blueprint $table) {

            $table->foreignId('pos_id')
                ->nullable($value = false)
                ->constrained('position')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('per_id')
                ->nullable($value = false)
                ->constrained('permission')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('pos_include');
    }
}
