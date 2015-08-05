<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('qrcode_id')->unsigned()->unique(); // Unique ID for Generating QR Code
			$table->string('name', 100)->unique(); // Bike Name
			$table->enum('state', array('normal', 'broken', 'repairing', 'repaired'))->default('normal'); // Bike State

			// ID of Stop Where Bike stopped
			$table->integer('stop_id')->unsigned();
			$table->foreign('stop_id')->references('id')->on('stops');

			$table->string('password', 10); // Current Password of Bike
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
        Schema::drop('bikes');
    }
}
