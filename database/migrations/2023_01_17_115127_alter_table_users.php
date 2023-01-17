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
        Schema::table('users', function(Blueprint $table){
            $table->string('mobile', 10)->unique()->after('email');
            $table->string('user_type', 10)->nullable()->after('remember_token');
            $table->string('otp', 6)->nullable()->after('user_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('mobile');
            $table->dropColumn('user_type');
            $table->dropColumn('otp');
        });
    }
};
