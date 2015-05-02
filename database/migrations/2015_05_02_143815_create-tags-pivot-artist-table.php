<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsPivotArtistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artist-tag-pivot', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('artist_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			$table->foreign('artist_id')->references('id')->on('artists');
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
		Schema::drop('artist-tag-pivot');
	}

}
