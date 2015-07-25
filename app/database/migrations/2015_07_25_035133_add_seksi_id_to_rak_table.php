<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeksiIdToRakTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rak', function(Blueprint $table)
		{
			$table->integer('seksi_id')->unsigned()->after('rak');
			$table->foreign('seksi_id')
				  ->references('id')->on('seksi')->onDelete('cascade')->onUpdate('no action');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rak', function(Blueprint $table)
		{
			//
		});
	}

}
