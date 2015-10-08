<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pinjam', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('arsip_id')->nullable();
			$table->foreign('arsip_id')->references('id')->on('arsip')->onDelete('set null');
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
			$table->unsignedInteger('status'); //status 1[pinjam] atau 2 [kembali]
			$table->datetime('time_pinjam');
			$table->datetime('time_kembali');
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
		Schema::drop('pinjam');
	}

}
