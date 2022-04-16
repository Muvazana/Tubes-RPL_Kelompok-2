<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaksin_stoks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vaksin_location_id')->unsigned();
            $table->integer('data_vaksin_id')->unsigned();
            $table->string('stok')->default(0)->nullable();

            $table->foreign('vaksin_location_id')->references('id')->on('vaksin_locations')->onDelete('cascade');
            $table->foreign('data_vaksin_id')->references('id')->on('data_vaksins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaksin_stoks');
    }
};
