<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('orders'))
        {
            Schema::create('orders', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->index();
	            $table->float('tax');
	            $table->float('shipping_cost');
	            $table->string('coupon_code');
	            $table->float('total_items_price');
	            $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('orders'))
        {
            Schema::drop('orders');
        }
    }
}
