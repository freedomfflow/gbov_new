<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('item_order'))
        {
            Schema::create('item_order', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('order_id')->unsigned()->index();
                $table->integer('item_id')->unsigned()->index();
                $table->integer('quantity')->unsigned();
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
        if (Schema::hasTable('item_order'))
        {
            Schema::drop('item_order');
        }
    }
}
