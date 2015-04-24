<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model {

	public function getArtworks()
	{
		return Artwork::where('artist_id',$this->id)->get();
	}

}
