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
        Schema::table('services', function(Blueprint $table){
            $table->unsignedBigInteger('district')->default(0);
            $table->unsignedBigInteger('corporation')->default(0);
            $table->unsignedBigInteger('municipality')->default(0);
            $table->unsignedBigInteger('grama_panchayat')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function(Blueprint $table){
            $table->dropColum('district');
            $table->dropColum('corporation');
            $table->dropColum('municipality');
            $table->dropColum('grama_panchayat');
        });
    }
};
