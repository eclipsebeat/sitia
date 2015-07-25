<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGudangIdToSeksiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('seksi', function(Blueprint $table)
		{
			$table->integer('gudang_id')->unsigned()->after('seksi');
			$table->foreign('gudang_id')
				  ->references('id')->on('gudang')->onDelete('cascade')->onUpdate('no action');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('seksi', function(Blueprint $table)
		{
			//
		});
	}

}
