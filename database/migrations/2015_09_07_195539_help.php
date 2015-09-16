<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Help extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('help', function (Blueprint $table) {
			$table->increments('id');

			$table->enum('type', array('caption', 'link'));
			$table->string('title', 200);
			$table->string('class', 500);

			$table->string('page_title', 10)->nullable();
			$table->string('content', 3000)->nullable();

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
		Schema::drop('help');
    }
}
