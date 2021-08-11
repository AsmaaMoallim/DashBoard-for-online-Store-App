<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('ord_id');

            $table->foreignId('cla_id')
                ->nullable($value = false)
                ->constrained('clients')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('ord_number');

            $table->date('ord_date');

            $table->integer('payment_method_id');

            $table->foreignId('stage_id')
                ->nullable($value = false)
                ->constrained('stage')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('ship_id')
                ->nullable($value = false)
                ->constrained('shipping_charge')
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
        Schema::dropIfExists('orders');
    }
}
