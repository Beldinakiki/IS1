<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('stand_id')->default(0);
            $table->string('name');
            $table->string('location');
            $table->string('date');
            $table->string('description');
            $table->string('image');
            $table->timestamps();

            $table->foreign('user_id')->references('id') ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
