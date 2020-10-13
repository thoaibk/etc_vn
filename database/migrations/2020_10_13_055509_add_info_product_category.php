<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoProductCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_categories', function (Blueprint $table) {
            $table->text('short_desc')->after('slug')->nullable();
            $table->unsignedBigInteger('image_id')->after('short_desc')->nullable();

            $table->string('seo_title', 255)->after('image_id')->nullable();
            $table->text('seo_description')->after('seo_title')->nullable();
            $table->string('seo_keywords', 255)->after('seo_description')->nullable();

            $table->foreign('image_id', 'product_categories_image_id_foreign')->references('id')->on('images')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropForeign('product_categories_image_id_foreign');
            $table->dropColumn([
                'short_desc',
                'image_id',
                'seo_title',
                'seo_description',
                'seo_keywords'
            ]);
        });
    }
}
