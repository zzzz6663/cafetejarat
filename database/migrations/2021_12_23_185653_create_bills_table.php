<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('video_id')->nullable();
            $table->string('type')->nullable();
            $table->string('for')->nullable();
            $table->string('parent')->nullable();
            $table->string('track')->nullable();
            $table->string('status')->default(0)->nullable();
            $table->unsignedBigInteger('remain')->default(0)->nullable();
            $table->string('price')->default(0)->nullable();
            $table->string('port')->default('zarinpal')->nullable();
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
        Schema::dropIfExists('bills');
    }
}
