<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterpriseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprise', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('NULL')->nullable()->comment('企业名称');
            $table->string('contentimg')->default('NULL')->nullable()->comment('类容图片');
            $table->string('logimg')->default('NULL')->nullable()->comment('企业log图片');
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
        Schema::dropIfExists('enterprise');
    }
}
