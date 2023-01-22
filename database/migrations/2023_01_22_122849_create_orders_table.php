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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('user');
            $table->string('payment_id', 50)->nullable();
            $table->string('payment_request_id', 50)->nullable();
            $table->string('payment_status', 10)->nullable();
            $table->decimal('amount', 7, 2)->default(0);
            $table->decimal('discount', 7, 2)->default(0);
            $table->string('payment_type', 10)->nullable();
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
};
