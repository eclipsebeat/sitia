<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRetensiToJenisarsipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jenis_arsip', function(Blueprint $table)
		{
			$table->integer('retensi')->unsigned()->after('jenis');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jenis_arsip', function(Blueprint $table)
		{
			//
		});
	}

}
