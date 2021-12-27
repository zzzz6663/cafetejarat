<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ostan_id')->nullable();
            $table->unsignedBigInteger('shahr_id')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->text('text')->nullable();
            $table->string('active')->default('1');
            $table->timestamps();
        });

        Schema::create('plan_user', function (Blueprint $table) {
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('producer')->default('0')->nullable();
            $table->string('user')->default('0')->nullable();
            $table->string('investor')->default('0')->nullable();
            $table->string('facilitator')->default('0')->nullable();
            $table->unique(['plan_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
