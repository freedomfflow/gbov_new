<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     * Laravel/Cashier required table
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('subscriptions'))
        {
            Schema::create('subscriptions', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->string('name');
                $table->string('stripe_id');
                $table->string('stripe_plan');
                $table->integer('quantity');
                $table->timestamp('trial_ends_at')->nullable();
                $table->timestamp('ends_at')->nullable();
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
        if (Schema::hasTable('subscriptions'))
        {
            Schema::drop('subscriptions');
        }
    }
}
