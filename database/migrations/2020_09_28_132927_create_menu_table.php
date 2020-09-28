<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->enum('type', ['references', 'custom_link']);

            $table->string('refer_model',100)->nullable();
            $table->unsignedBigInteger('refer_id')->nullable();

            $table->string('custom_link')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('index')->default(0);
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('menus')->nullOnDelete();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
