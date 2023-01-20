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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
            $table->string('contact_name', 50)->nullable();
            $table->string('mobile', 10)->nullable();
            $table->text('address')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('pincode', 10)->nullable();
            $table->text('landmark')->nullable();
            $table->unsignedBigInteger('district')->references('id')->on('districts')->default(0);
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('districts');
    }
};
