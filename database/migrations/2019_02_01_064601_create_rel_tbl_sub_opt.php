<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelTblSubOpt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_tbl_sub_opts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tag_id');
            $table->integer('brand_id');
            $table->timestamps();
            $table->unique(['tag_id','brand_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_tbl_sub_opts');
    }
}
