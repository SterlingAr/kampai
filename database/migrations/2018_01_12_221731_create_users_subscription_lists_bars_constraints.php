<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersSubscriptionListsBarsConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {

            $table->integer('subscription_list_bar_id')
                ->unsigned()
                ->nullable();

            $table->foreign('subscription_list_bar_id')
                ->references('id')
                ->on('subscription_lists_bars')
                ->onDelete('cascade');


        });


        Schema::table('subscription_lists_bars', function (Blueprint $table) {

            $table->integer('user_id')
                ->unsigned()
                ->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('subscription_lists_bars')
                ->onDelete('cascade');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
