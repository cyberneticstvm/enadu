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
        Schema::table('attendances', function(Blueprint $table){            
            $table->string('location_out')->after('longitude')->nullable();
            $table->double('latitude_out')->after('location_out')->nullable();
            $table->string('longitude_out')->after('latitude_out')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendances', function(Blueprint $table){
            $table->dropColumn('location_out');
            $table->dropColumn('latitude_out');
            $table->dropColumn('longitude_out');
        });
    }
};
