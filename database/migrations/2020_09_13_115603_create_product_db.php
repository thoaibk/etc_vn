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
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->enum('status', ['active', 'inactive']);

            $table->foreign('parent_id')->references('id')->on('product_categories')->cascadeOnDelete();

            $table->index('status');
            $table->timestamps();

        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name',255);
            $table->string('slug',255);

            $table->integer('origin_price')->nullable();
            $table->integer('price')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->string('seo_title', 255)->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->enum('status', ['active', 'inactive']);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id', 'product_user_id_foreign')->references('id')->on('users')->nullOnDelete();
            $table->foreign('image_id', 'products_image_id_foreign')->references('id')->on('images')->nullOnDelete();

            $table->index('status');
        });

        Schema::create('product_has_images', function (Blueprint $table){
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('image_id');

            $table->foreign('product_id', 'product_has_images_product_id_foreign')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('image_id', 'product_has_images_image_id_foreign')->references('id')->on('images')->cascadeOnDelete();
        });

        Schema::create('product_has_category', function (Blueprint $table){
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('product_id', 'product_has_category_product_id_foreign')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('category_id', 'product_has_category_category_id_foreign')->references('id')->on('product_categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_has_category');
        Schema::dropIfExists('product_has_images');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_categories');
    }
}
