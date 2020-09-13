<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function(Blueprint $table)
        {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->enum('status', ['active', 'inactive']);

            $table->timestamps();

        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name',255);
            $table->string('slug',255);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('origin_price')->nullable();
            $table->integer('price')->nullable();
            $table->longText('content');
            $table->string('picture')->nullable();
            $table->string('seo_title', 255)->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->enum('status', ['active', 'inactive']);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('category_id')->references('id')->on('product_categories')->nullOnDelete();
            $table->index('status');
        });

        Schema::create('product_has_images', function (Blueprint $table){
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('image_id');

            $table->foreign('product_id', 'product_id_foreign')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('image_id', 'image_id_foreign')->references('id')->on('images')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_has_images');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_categories');
    }
}
