<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            $table->bigIncrements('man_id');

            $table->string('man_frist_name');
            $table->string('man_last_name');
            $table->string('man_phone_num')->unique();
            $table->string('man_email')->unique();
            $table->string('man_password');
            $table->string('remember_token')->nullable();
            $table->timestamps();

            $table->foreignId('pos_id')
                ->nullable($value = false)
                ->constrained('position')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('manager');
    }
}
