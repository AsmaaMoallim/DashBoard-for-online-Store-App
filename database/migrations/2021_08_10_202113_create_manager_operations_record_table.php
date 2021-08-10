<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerOperationsRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_operations_record', function (Blueprint $table) {
            $table->bigIncrements('man_oper_record_id');

            $table->foreignId('man_id')
                ->nullable($value = false)
                ->constrained('managers')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->date('man_oper_date');
            $table->time('man_oper_time');
            $table->string('man_operation');
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
        Schema::dropIfExists('manager_operations_record');
    }
}
