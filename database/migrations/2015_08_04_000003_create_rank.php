<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rank', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('min_score')->unsigned()->unique(); // Min Score for Current Rank
			$table->string('name', 50); // Rank Name
			$table->integer('max_time'); // Max Renting Time for Current Rank
			$table->integer('max_time_special'); // Max Renting Time for Current Rank During Special Time
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
        Schema::drop('rank');
    }
}
