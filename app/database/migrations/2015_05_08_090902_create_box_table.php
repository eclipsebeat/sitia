<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('box', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('box');
			$table->integer('rak_id')->unsigned();
			$table->foreign('rak_id')
				  ->references('id')->on('rak')->onDelete('cascade')->onUpdate('no action');
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
		Schema::drop('box');
	}

}
