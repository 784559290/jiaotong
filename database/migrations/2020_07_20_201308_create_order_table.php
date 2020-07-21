<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default('NULL')->nullable()->comment('用户id');
            $table->string('order_no')->default('NULL')->nullable()->comment('订单号');
            $table->integer('address')->default('NULL')->nullable()->comment('地址id');
            $table->decimal('payment')->default('NULL')->nullable()->comment('付款金额');
            $table->integer('payment_type')->default('NULL')->nullable()->comment('支付类型 1微信小程序');
            $table->integer('status')->default('NULL')->nullable()->comment('订单状态 1 未支付 2已支付 3关闭订单 4订单删除');
            $table->timestamp('end_time')->default('NULL')->nullable()->comment('订单完成时间');
            $table->timestamp('close_time')->default('NULL')->nullable()->comment('订单关闭时间');
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
        Schema::dropIfExists('order');
    }
}
