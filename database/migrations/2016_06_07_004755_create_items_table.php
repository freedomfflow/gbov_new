<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('items'))
        {
            Schema::create('items', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 60);
                $table->text('description');
                $table->string('sku', 30);
                $table->string('image_path',255);
                $table->boolean('taxable');
                $table->string('size', 10)->nullable();
                $table->decimal('price', 7, 2);
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
        if (Schema::hasTable('items'))
        {
            Schema::drop('items');
        }
    }
}
