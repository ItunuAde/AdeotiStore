<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->ForeignId('product_id');
            $table->string('name');
            $table->string('address');
            $table->string('LGA');
            $table->string('state');
            $table->string('email');
            $table->string('telephone');
            $table->string('product');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('status')->default(0);
            $table->integer('total');
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
