<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bars', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->bigInteger('node');
            $table->string('name')->nullable();
            $table->string('amenity')->nullable();
            $table->string('amenity_es')->nullable();
            $table->text('description')->nullable();
            $table->text('description_1')->nullable();
            $table->text('all_tags')->nullable();
            $table->text('keywords')->nullable();

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

    }
}
