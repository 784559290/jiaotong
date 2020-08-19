<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShufflingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shuffling', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable()->comment('图片');
            $table->integer('shuffling')->default('0')->nullable()->comment('分类');
            $table->integer('shuffling_id')->nullable()->comment('推荐分类id');
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
        Schema::dropIfExists('shuffling');
    }
}
