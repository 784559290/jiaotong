<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('NULL')->nullable()->comment('名称');
            $table->string('field')->default('NULL')->nullable()->comment('投资领域');
            $table->string('content')->default('NULL')->nullable()->comment('详情');
            $table->string('logimg')->default('NULL')->nullable()->comment('log图片');
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
        Schema::dropIfExists('investment');
    }
}
