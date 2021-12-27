<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->unsignedBigInteger('shahr_id')->nullable();
            $table->unsignedBigInteger('ostan_id')->nullable();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->string('active',5)->default(1)->nullable();
            $table->timestamps();
        });
        Schema::create('payam_user', function (Blueprint $table) {
            $table->unsignedBigInteger('payam_id');
            // $table->foreign('payam_id')->references('id')->on('payams')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('seen')->nullable();
            $table->unique(['payam_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payam_user');
        Schema::dropIfExists('payams');
    }
}
