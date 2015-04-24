<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model {

	public function artist()
	{
		return $this->belongsTo('\App\Artist', 'artist_id');
	}

	public function getImagePath()
	{
		return asset('images/artworks/' . $this->id . '.jpg');
	}

}
