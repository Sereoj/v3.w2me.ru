<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('description', 250)->nullable();
            $table->string('country')->nullable();
            $table->date('dob')->nullable();
            $table->string('cover')->nullable();
            $table->string('avatar')->nullable();
            $table->string('favorite_themes')->nullable();
            $table->string('install_themes')->nullable();
            $table->string('lang')->nullable();
            $table->string('api_token')->nullable();
            $table->enum('upload', ['yes', 'no'])->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google')->nullable();
            $table->enum('status', ['Active', 'Disabled'])->nullable();
            $table->enum('reported', ['yes', 'no'])->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
