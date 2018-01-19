<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_roles', function (Blueprint $table) {
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('id')
                ->on('roles')->onDelete('cascade');
            $table->integer('permission_id')->unsigned()->nullable();
            $table->foreign('permission_id')->references('id')
                ->on('permissions')->onDelete('cascade');
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