<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guest_id');
            $table->string('products_list');
            $table->integer('sales')->nullable();
            $table->integer('total_bill');
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Bills');
    }
}
