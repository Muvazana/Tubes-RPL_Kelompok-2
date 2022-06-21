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
        Schema::create('user_members', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->primary();
            $table->string('nik', 100)->unique();
            $table->string('child_name', 255);
            $table->enum('child_gender', ['laki_laki', 'perempuan',])->default('laki_laki')->nullable();
            $table->date('child_birth_date');
            $table->string('phone_number', 100);
            $table->text('address');
            $table->text('optional_address')->nullable();
            $table->string('zip_code', 20);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('latitude', 100)->nullable();
            $table->string('longitude', 100)->nullable();
            $table->text('document_path');
            $table->enum('status', ['verified', 'not_verified',])->default('not_verified')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_members');
    }
};
