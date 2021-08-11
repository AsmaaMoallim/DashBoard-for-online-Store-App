<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdAvilInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_avil_in', function (Blueprint $table) {
            $table->foreignId('prod_id')
                ->nullable($value = false)
                ->constrained('product')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('mesu_id')
                ->nullable($value = false)
                ->constrained('measure')
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
        Schema::dropIfExists('prod_avil_in');
    }
}
