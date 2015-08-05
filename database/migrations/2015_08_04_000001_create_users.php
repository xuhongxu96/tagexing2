<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
			// Weixin Openid
			$table->string('openid', 64)->unique();
			
			// User Information
			$table->string('name', 100); // Name
			$table->enum('gender', array('male', 'female')); // Gender
			$table->string('email', 300); // E-mail
			$table->string('mobile', 100); // Mobile Phone Number
			$table->string('qq', 300)->nullable(); // QQ Number (Optional)

			// User Profile
			$table->enum('state', array('registered', 'normal', 'rented', 'disabled'))->default('registered'); // User State
			$table->dateTime('free_at'); // Time When Disabled User Should Be Free
			$table->integer('score')->default(60);  // Score
			$table->integer('total')->default(0);  // Total Duration
			$table->string('message', 500)->nullable(); // Message Given By Admin

			// User's Authority
			// TODO: Design the authorities.
			$table->integer('auth')->default(0); // 0: users, 1: 

			// Student Information
			$table->string('school', 100);
			$table->string('student_id', 100);
			$table->string('department', 300)->nullable();

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
        Schema::drop('users');
    }
}
