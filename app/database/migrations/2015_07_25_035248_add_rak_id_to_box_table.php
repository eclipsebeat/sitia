<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRakIdToBoxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('box', function(Blueprint $table)
		{
			$table->integer('rak_id')->unsigned()->after('box');
			$table->foreign('rak_id')
				  ->references('id')->on('rak')->onDelete('cascade')->onUpdate('no action');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('box', function(Blueprint $table)
		{
			//
		});
	}

}
