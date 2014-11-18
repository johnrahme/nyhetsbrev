<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmailData extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('emailData', function($table){
            $table->increments('id');
            $table->integer('emailId')->unsigned();
            $table->foreign('emailId')->references('id')->on('emails');
            $table->string('header');
            $table->string('position');
            $table->text('content');
            $table->string('pictureUrl');
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
		//
	}

}
