<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rollback extends Migration
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
        Schema::table('subscription_lists_bars', function(Blueprint $table){

            $table->dropForeign(['bar_id']);
            $table->dropForeign(['subscription_list_id']);


            $table->dropColumn('bar_id');
            $table->dropColumn('subscription_list_id');

        });

        Schema::dropIfExists('subscription_lists_bars');




        Schema::table('subscription_lists', function(Blueprint $table){

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

        });


        Schema::table('permission_roles', function(Blueprint $table){

            $table->dropForeign(['role_id']);
            $table->dropForeign(['permission_id']);


        });


        Schema::table('role_users', function(Blueprint $table){

            $table->dropForeign(['user_id']);
            $table->dropForeign(['role_id']);


        });


        Schema::dropIfExists('subscription_lists');



        Schema::table('bars', function(Blueprint $table){

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

        });


        Schema::dropIfExists('bars');


        Schema::dropIfExists('users');

        Schema::dropIfExists('permissions');

        Schema::dropIfExists('roles');

        Schema::dropIfExists('role_users');

        Schema::dropIfExists('permission_roles');











    }
}
