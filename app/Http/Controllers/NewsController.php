<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\NewsArticle;

use Illuminate\Http\Request;

class NewsController extends Controller 
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$news = NewsArticle::all();
		return view('news/index', ['news'=>$news]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('news/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 // validate
        $rules = array(
            'title'       => 'required',
            'content'      => 'required',
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('news/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        } else {
            // store
            $article = new NewsArticle;
            $article->title = \Input::get('title');
            $article->content = \Input::get('content');
            $article->save();

            // redirect
            return \Redirect::to('news');
        }
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
		// get the article
        $article = NewsArticle::find($id);

        // show the edit form and pass the article
        return view('news/edit')->with('article', $article);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
        $rules = array(
            'title' => 'required',
            'content' => 'required',
        );
        $validator = \Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('news/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        } else {
            // store
            $article = NewsArticle::find($id);
            $article->title = \Input::get('title');
            $article->content = \Input::get('content');
            $article->save();

            // redirect
            return \Redirect::to('/news');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $article = NewsArticle::find($id);
        $article->delete();

        // redirect
        return\ Redirect::to('news');
	}
}
