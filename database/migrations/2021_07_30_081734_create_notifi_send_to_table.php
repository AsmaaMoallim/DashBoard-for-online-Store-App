<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifiSendToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifi_send_to', function (Blueprint $table) {
            $table->foreignId('notifi_id')
                ->nullable($value = false)
                ->constrained('notifications')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('cla_id')
                ->nullable($value = false)
                ->constrained('clients')
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
        Schema::dropIfExists('notifi_send_to');
    }
}
