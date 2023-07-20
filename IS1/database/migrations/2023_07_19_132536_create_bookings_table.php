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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('stand_id');
            $table->string('date');
            $table->integer('quantity');
            $table->decimal('down_payment', 8, 2);
            $table->timestamps();

            //$table->foreignId('user_id')->references('id')->on('user')->onDelete('cascade');
            //$table->foreignId('stand_id')->references('id')->on('stands')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
