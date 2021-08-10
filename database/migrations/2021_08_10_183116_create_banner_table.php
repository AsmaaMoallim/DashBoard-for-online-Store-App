<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\Utilities\Config;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {
            $table->bigIncrements('ban_id');

            $table->string('ban_name')->unique();

            $table->foreignId('medl_id')
                ->nullable($value = false)
                ->constrained('banner')
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
        Schema::dropIfExists('banner');
    }
}
