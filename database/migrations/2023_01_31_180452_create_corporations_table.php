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
        Schema::create('corporations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district');
            $table->string('name');
            $table->foreign('district')->references('id')->on('districts')->onDelete('cascade');
        });

        Schema::create('municipalities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corporation');
            $table->string('name');
            $table->foreign('corporation')->references('id')->on('corporations')->onDelete('cascade');
        });

        Schema::create('grama_panchayats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('municipality');
            $table->string('name');
            $table->foreign('municipality')->references('id')->on('municipalities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corporations');
        Schema::dropIfExists('municipalities');
        Schema::dropIfExists('grama_panchayats');
    }
};
