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
			$table->unsignedInteger('departemen_id')->nullable();
			$table->foreign('departemen_id')->references('id')->on('departemen')->onDelete('set null');
			$table->unsignedInteger('kanwil_id')->nullable();
			$table->foreign('kanwil_id')->references('id')->on('kanwil')->onDelete('set null');
			$table->string('kantor', 50);
			$table->string('alamat', 255);
			$table->string('telpon', 30);
			$table->string('fax', 30);
			$table->string('email', 30);
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