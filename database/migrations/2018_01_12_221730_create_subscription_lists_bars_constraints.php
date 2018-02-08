<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionListsBarsConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_lists_bars', function (Blueprint $table) {

            $table->integer('subscription_list_id')
                ->unsigned()
                ->nullable();


            $table->integer('bar_id')
                ->unsigned()
                ->nullable();


            $table->foreign('subscription_list_id')
                ->references('id')
                ->on('subscription_lists')
                ->onDelete('cascade');


            $table->foreign('bar_id')
                ->references('id')
                ->on('bars')
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
