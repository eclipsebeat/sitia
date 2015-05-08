<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKantorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kantor', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kantor', 50);
			$table->string('alamat', 255);
			$table->string('telpon', 30);
			$string->('fax', 30);
			$string->('email', 30);
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
		Schema::drop('kantor');
	}

}
