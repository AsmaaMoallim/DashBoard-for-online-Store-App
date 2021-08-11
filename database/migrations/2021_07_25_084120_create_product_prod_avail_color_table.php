<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductProdAvailColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_prod_avail_color', function (Blueprint $table) {
            $table->char('prod_avil_color', 8);

            $table->foreignId('prod_id')
                ->nullable($value = false)
                ->constrained('product')
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
        Schema::dropIfExists('product_prod_avail_color');
    }
}
