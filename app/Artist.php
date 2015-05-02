<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model {

	public static function allWithoutUnknown() 
	{
		$artists = self::all();
		$newArtists = new \stdClass();
		foreach ($artists as $artist) {
			if ($artist->id != 0) {
				$newArtists->{$artist->id} = $artist;
			}
		}
		return $newArtists;
	}

	public function getArtworks()
	{
		return Artwork::where('artist_id', $this->id)->get();
	}

	public function getTags()
	{
		$tagpivots = \App\ArtistTagPivot::where('artist_id', $this->id)->get();
		$tags = [];
		foreach ($tagpivots as $tagpivot) {
			$tags[] = \App\Tag::find($tagpivot->tag_id);
		}
		return $tags;
	}

}
