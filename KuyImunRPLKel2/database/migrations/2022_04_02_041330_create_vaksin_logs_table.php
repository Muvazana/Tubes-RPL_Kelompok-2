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
        Schema::create('vaksin_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('vaksin_location_id')->unsigned();
            $table->integer('data_vaksin_id')->unsigned();
            $table->enum('status', ['accepted', 'rejected', 'pending'])->default('pending')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('vaksin_location_id')->references('id')->on('vaksin_locations');
            $table->foreign('data_vaksin_id')->references('id')->on('data_vaksins');
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
        Schema::dropIfExists('vaksin_logs');
    }
};
