<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommodityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('orderName')->nullable()->comment('商品名称');
            $table->string('brief')->nullable()->comment('商品简介');
            $table->integer('holdersid')->nullable()->comment('持有人id');
            $table->text('orderdetails')->nullable()->comment('商品详情');
            $table->text('Slideshow')->nullable()->comment('推荐图片');
            $table->integer('classifications')->nullable()->comment('分类');
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
        Schema::dropIfExists('commodity');
    }
}
