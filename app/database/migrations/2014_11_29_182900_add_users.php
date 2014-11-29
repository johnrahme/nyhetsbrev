<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        DB::table('newsletter_users')->insert(array(
            'username' => 'John Rahme',
            'email' => 'john.rahme.se@gmail.com',
            'password' => Hash::make('123'),
            'level' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::table('newsletter_users') -> where('username', '=', "John Rahme")-> delete();
	}

}
