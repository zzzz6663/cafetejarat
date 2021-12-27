<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->string('name',50)->nullable();;
            $table->string('family',50)->nullable();;
            $table->unsignedBigInteger('ostan_id')->nullable();
            $table->unsignedBigInteger('shahr_id')->nullable();
            $table->string('email',50)->unique()->nullable();
            $table->string('mobile',50)->unique()->nullable();
            $table->string('code',50)->unique()->nullable();
            $table->string('tell',50)->unique()->nullable();
            $table->string('level',50)->default('agent')->nullable();
            $table->string('madrak',50)->nullable();
            $table->string('job',50)->nullable();
            $table->string('wmobile',50)->nullable();
            $table->string('insta',100)->nullable();
            $table->string('telegram',100)->nullable();
            $table->string('introduced',50)->nullable();
            $table->string('ability',800)->nullable();
            $table->string('rel',800)->nullable();
            $table->string('about',800)->nullable();
            $table->string('fave',800)->nullable();
            $table->string('connector')->nullable();
            // $table->string('about',800)->nullable();
            $table->string('info_complete')->nullable()->default('0');
            $table->string('tendency',800)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();;
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
