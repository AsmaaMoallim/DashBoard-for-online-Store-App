<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('prod_id');

            $table->string('prod_name');

            $table->foreignId('sub_id')
                ->nullable($value = false)
                ->constrained('sub_section')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->float('prod_price');

            $table->integer('prod_avil_amount');

            $table->binary('prod_desc_img');

            $table->foreignId('medl_id')
                ->nullable($value = false)
                ->constrained('media_library')
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
        Schema::dropIfExists('product');
    }
}
