<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteSubscriptionListsBarsConstraints extends Migration
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
            $table->dropColumn('bar_id');

            $table->dropForeign(['subscription_list_id']);
            $table->dropColumn('subscription_list_id');

            Schema::dropIfExists('subscription_lists_bars');
            Schema::dropIfExists('subscription_lists');


        });


    }
}
