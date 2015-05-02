<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model {

	public function getArtworks()
	{
		$tags = \App\ArtworkTagPivot::where('tag_id', $this->id)->get();
		$artworks = [];
		foreach ($tags as $tag) {
			$artworks[] = \App\Artwork::find($tag->artwork_id);
		}
		return $artworks;
	}

	public function getArtists()
	{
		$tags = \App\ArtistTagPivot::where('tag_id', $this->id)->get();
		$artists = [];
		foreach ($tags as $tag) {
			$artists[] = \App\Artist::find($tag->artist_id);
		}
		return $artists;

	}

}
