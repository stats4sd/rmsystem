<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTagsResources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tags_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tag_id')->unsigned();
            $table->integer('resource_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('tag')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('resource_id')->references('id')->on('resource')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tags_resources', function (Blueprint $table) {
            //
        });
    }
}
