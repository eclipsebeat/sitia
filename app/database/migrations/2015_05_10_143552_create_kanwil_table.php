<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKanwilTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kanwil', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('departemen_id')->nullable();
			$table->foreign('departemen_id')->references('id')->on('departemen')->onDelete('set null');
			$table->string('kanwil');
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
		Schema::drop('kanwil');
	}

}
