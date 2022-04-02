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
        Schema::create('user_admins', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->primary();
            $table->integer('vaksin_location_id')->unsigned();
            $table->string('name', 255);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('vaksin_location_id')->references('id')->on('vaksin_locations');
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
        Schema::dropIfExists('user_admins');
    }
};
