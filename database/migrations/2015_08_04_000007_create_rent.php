<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent', function (Blueprint $table) {
            $table->increments('id');

			$table->enum('type', array('rent', 'return'));

			// User ID of Current Record
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->integer('max_time'); // Max Renting Duration

			// Bike ID of Current Record
			$table->integer('bike_id')->unsigned();
			$table->foreign('bike_id')->references('id')->on('bikes');

			// Start Stop ID of Current Record
			$table->integer('stop_id')->unsigned();
			$table->foreign('stop_id')->references('id')->on('stops');

			$table->string('password', 10); // Password for Lock

			$table->enum('broken_type', array('lock', 'bike', 'other'))->nullable(); // Broken Type User Reported
			$table->string('broken_desp', 500)->nullable(); // Broken Description User Reported
			
			$table->string('comment', 500)->nullable(); // Comment Written By Admin

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
        Schema::drop('rent');
    }
}
