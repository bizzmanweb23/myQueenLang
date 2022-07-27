<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_unique');
            $table->integer('user_id');
            $table->string('payment_method');
            $table->string('shipping_method');
            $table->integer('is_bill_same_ship')->default(0);
            $table->integer('billing_id');
            $table->integer('shipping_id');
            $table->string('user_ip');
            $table->string('order_currency');
            $table->integer('quantity');
            $table->integer('quantity');
            $table->decimal('order_sum', 20, 2);
            $table->decimal('total_pv', 20, 2);
            $table->string('coupon_code')->nullable();
            $table->string('discount_type')->nullable();
            $table->decimal('discount_amount', 20, 2)->nullable();
            $table->decimal('how_may_discount', 20, 2)->nullable();
            $table->decimal('after_discount_price', 20, 2)->nullable();
            $table->decimal('shipping_charge', 20, 2)->nullable();
            $table->decimal('total', 20, 2);
            $table->integer('payment_status')->nullable();
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
        Schema::dropIfExists('orders');
    }
}