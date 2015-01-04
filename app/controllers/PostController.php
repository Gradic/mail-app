<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /post
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /post/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('post.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /post
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			  'sender' => 'required|email',
			  'theme' => 'required',
			  'text' => 'required',
			);
		$messages = array(
			'sender.required' => 'El. paštas privalomas.',
			'sender.email' => 'Netinkamas el. pašto adresas.',
			'theme.required' => 'Laukelis tema privalomas.',
			'text.required' => '	Būtina įvesti tekstą.',);
		$validator = Validator::make(Input::all(), $rules, $messages);
		if ($validator->fails()) {
		  return Redirect::to('post/create')->withErrors($validator)->withInput();
		} else {
			if(Input::get('send')){
				$send = 1;
			}else{
				$send = 0;
			}
			$post = new Post;
			$post->sender = Input::get('sender');
			$post->theme = Input::get('theme');
			$post->text = Input::get('text');
			$post->lastID = 0;
			$post->status = $send;
			$post->save();
			  return Redirect::to('/')->with('messageSuccess', 'Naujienlaiškis sukurtas.');
		}
	
	}

	/**
	 * Display the specified resource.
	 * GET /post/{id}
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
	 * GET /post/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		return View::make('post.edit', array('post' => $post));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /post/{id}
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
	 * DELETE /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::find($id)->delete();
		return Redirect::to('/');
	}

}