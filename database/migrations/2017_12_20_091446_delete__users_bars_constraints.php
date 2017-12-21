<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteUsersBarsConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){

            $table->dropForeign(['bar_id']);

            $table->dropColumn('bar_id');
        });


        Schema::table('bars', function(Blueprint $table){

            $table->dropForeign(['user_id']);



            $table->dropColumn('user_id');

        });


        Schema::dropIfExists('users');
        Schema::dropIfExists('bars');
    }
}