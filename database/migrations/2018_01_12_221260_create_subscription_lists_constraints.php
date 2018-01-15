<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionListsConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('subscription_lists', function(Blueprint $table){


            $table->integer('user_id')
                ->unsigned()
                ->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

        });

        Schema::table('users', function(Blueprint $table){


            $table->integer('subscription_list_id')
                ->unsigned()
                ->nullable();

            $table->foreign('subscription_list_id')
                ->references('id')
                ->on('subscription_lists')
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

    }
}
