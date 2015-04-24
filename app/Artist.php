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
		return Artwork::where('artist_id',$this->id)->get();
	}

}
