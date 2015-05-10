<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArsipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arsip', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('arsip', 255);
			$table->unsignedInteger('jenis_arsip_id')->nullable();
			$table->foreign('jenis_arsip_id')->references('id')->on('jenis_arsip')->onDelete('set null');
			$table->unsignedInteger('gudang_id')->nullable();
			$table->foreign('gudang_id')->references('id')->on('gudang')->onDelete('set null');
			$table->unsignedInteger('rak_id')->nullable();
			$table->foreign('rak_id')->references('id')->on('rak')->onDelete('set null');
			$table->unsignedInteger('box_id')->nullable();
			$table->foreign('box_id')->references('id')->on('box')->onDelete('set null');
			$table->unsignedInteger('seksi_id')->nullable();
			$table->foreign('seksi_id')->references('id')->on('seksi')->onDelete('set null');
			$table->unsignedInteger('user_id')->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
		Schema::drop('arsip');
	}

}
