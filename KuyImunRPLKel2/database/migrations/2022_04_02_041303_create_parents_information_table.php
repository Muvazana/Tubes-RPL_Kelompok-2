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
        Schema::create('parents_information', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->primary();
            $table->string('nik', 100)->unique();
            $table->string('name', 255);
            $table->enum('parent_type', ['father', 'mother',])->default('father')->nullable();

            $table->foreign('user_id')->references('user_id')->on('user_members');
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
        Schema::dropIfExists('parents_information');
    }
};
