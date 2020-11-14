<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tags', function (Blueprint $table){
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();

            $table->string('seo_title', 255)->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();

            $table->enum('status', ['publish', 'hidden'])->default('publish');
            $table->dateTime('publish_time')->nullable();

            $table->enum('approve_status', ['pending', 'yes', 'no'])->default('pending');
            $table->dateTime('approve_time')->nullable();

            $table->integer('view_count')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id', 'posts_user_id_foreign')->references('id')->on('users')->nullOnDelete();
            $table->foreign('image_id', 'posts_image_id_foreign')->references('id')->on('images')->nullOnDelete();
            $table->index('status');
        });


        Schema::create('post_has_tags', function (Blueprint $table){
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
            $table->foreign('tag_id')->references('id')->on('tags')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_has_tags');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('posts');
    }
}
