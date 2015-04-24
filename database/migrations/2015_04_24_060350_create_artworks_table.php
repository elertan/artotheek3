<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtworksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('artworks', function(Blueprint $table) {
			$table->create('artworks');
			$table->increments('id');
			$table->string('name', 50);
			$table->string('description', 500);
			$table->integer('artist_id')->unsigned();
			$table->foreign('artist_id')->references('id')->on('artists');
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
		Schema::table('artworks', function(Blueprint $table) {
			$table->drop('artworks');
		});
	}

}
