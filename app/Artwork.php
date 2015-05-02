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

	public function getGalleryImagePath()
	{
		return asset('images/artworks/gallery/' . $this->id . '.jpg');
	}

	public function getTags()
	{
		$tagpivots = \App\ArtworkTagPivot::where('artwork_id', $this->id)->get();
		$tags = [];
		foreach ($tagpivots as $tagpivot) {
			$tags[] = \App\Tag::find($tagpivot->tag_id);
		}
		return $tags;
	}

}
