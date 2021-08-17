<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('com_id');

            $table->foreignId('cla_id')
                ->references('cla_id')
                ->on('clients')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('prod_id')
                ->references('prod_id')
                ->on('product')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->longText('com_content');
            $table->integer('com_rateing');

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
        Schema::dropIfExists('comments');
    }
}
