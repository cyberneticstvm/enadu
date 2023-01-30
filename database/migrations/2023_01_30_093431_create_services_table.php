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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product')->references('id')->on('products');
            $table->string('ptype')->nullable();
            $table->string('ptype_address')->nullable();
            $table->unsignedBigInteger('address')->references('id')->on('addresses')->default(0);
            $table->boolean('status')->comment('0-Pending, 1-Completed')->default(0);            
            $table->unsignedBigInteger('created_by')->references('id')->on('users');           
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
        Schema::dropIfExists('services');
    }
};
