<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('approve_photos',['yes', 'no'])->nullable();
            $table->enum('download',['registered', 'not registered'])->nullable();
            $table->integer('upload_limit')->nullable();
            $table->string('description_length', 1000)->nullable();
            $table->string('comment_length', 1000)->nullable();
            $table->string('file_size')->nullable();
            $table->integer('min_height')->nullable();
            $table->integer('min_width')->nullable();
            $table->integer('tags_limit')->nullable();
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
        Schema::dropIfExists('upload_settings');
    }
}
