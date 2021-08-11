<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdHasItemOfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ord_has_item_of', function (Blueprint $table) {

            $table->foreignId('prod_id')
                ->nullable($value = false)
                ->constrained('product')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('prod_ord_amount');

            $table->foreignId('ord_id')
                ->nullable($value = false)
                ->constrained('orders')
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
        Schema::dropIfExists('ord_has_item_of');
    }
}
