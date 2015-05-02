<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsPivotArtworkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artwork-tag-pivot', function ($table) {
			$table->increments('id');
			$table->integer('artwork_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			$table->foreign('artwork_id')->references('id')->on('artworks');
			$table->foreign('tag_id')->references('id')->on('tags');
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
		Schema::drop('artwork-tag-pivot');
	}

}
