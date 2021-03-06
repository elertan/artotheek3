<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Http\Request;
use App\Artwork;
use App\ArtworkState;
use Input;

class ArtworkController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$artworks = Artwork::all();
		return view('artwork/index', [
			'artworks' => $artworks
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
    {
        // Is admin?
        if (Auth::check()) {
            return view('artwork/create-admin');
        } else {
            return view('artwork/create');
        }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
    }

    public function json() {
        $artworks = Artwork::all();
        return response()->json((array)$artworks);
    }

    public function setState() {
    	$id = Input::get('id');
    	$state = Input::get('newstate');

    	$artwork = Artwork::find($id);

    	if (!$artwork) {
    		return App::abort(404, 'No such artwork');
    	} else {
    		$artwork->state = (int)$state;
    		$artwork->save();
    	}

    }

}
