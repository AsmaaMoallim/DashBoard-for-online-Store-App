<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('notifi_id');
            $table->string('notifi_title');
            $table->longText('notifi_content');

            $table->foreignId('man_id')->unsigned()
                ->references('man_id')
                ->on('manager')
                ->constrained()
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
        Schema::dropIfExists('notifications');
    }
}
