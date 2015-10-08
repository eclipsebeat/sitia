<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRakTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rak', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('rak', 50);
			$table->integer('seksi_id')->unsigned();
			$table->foreign('seksi_id')
				  ->references('id')->on('seksi')->onDelete('cascade')->onUpdate('no action');
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
		Schema::drop('rak');
	}

}
