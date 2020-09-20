<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDb extends Migration
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
            $table->string('name', 255);
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->text('address')->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('process_note')->nullable();
            $table->string('hash', 100);
            $table->timestamps();

            $table->index('status');
            $table->index('hash');

        });

        Schema::create('order_items', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->bigInteger('item_id');
            $table->string('item_type');
            $table->bigInteger('price');
            $table->integer('qty');
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
}
