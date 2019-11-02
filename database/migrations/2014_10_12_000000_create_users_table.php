<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if (! Schema::hasTable('users'))
		{
			Schema::create('users', function (Blueprint $table) {
				// Address info may get put in separate table, but for now its effectively 'ship to' address
				$table->increments('id');
				$table->string('email')->unique();
				$table->string('password');
				$table->string('first_name', 40);
				$table->string('last_name', 60);
				$table->string('address', 100);
				$table->string('address2', 20);
				$table->string('city', 40);
				$table->string('state', 2);
				$table->string('zip', 10);
				$table->rememberToken();
				$table->string('stripe_id')->nullable();            // For laravel/cashier
				$table->string('card_brand')->nullable();           // For laravel/cashier
				$table->string('card_last_four')->nullable();       // For laravel/cashier
				$table->timestamp('trial_ends_at')->nullable();     // For laravel/cashier
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
        if (Schema::hasTable('users'))
        {
	        Schema::drop('users');
        }
    }
}
