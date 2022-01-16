<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('preview');
            $table->enum('licence', ['free', 'payment'])->default('free');
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('downloads')->default(0);
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('download_link')->nullable();
            $table->json('meta')->nullable();
            $table->boolean('isActive')->default(false);
            $table->boolean('reported')->default(false);
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('type', ['sunrise', 'day', 'sunset', 'night']);
            $table->string('location')->nullable();
            $table->string('photo_type')->nullable();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained('tags')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('user_friends', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('friend_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('user_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('user_favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('user_installs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('leaderboard')->nullable();
            $table->string('rectangle')->nullable();
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
        Schema::dropIfExists('post');
        Schema::dropIfExists('image');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('photo_tags');
        Schema::dropIfExists('likes');
        Schema::dropIfExists('favorites');
        Schema::dropIfExists('installs');
        Schema::dropIfExists('photo_categories');
        Schema::dropIfExists('advertisements');
    }
}
