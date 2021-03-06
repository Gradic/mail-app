<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */

	public function login(){
		return View::make('users.login');
	}

	public function handleLogin(){

		$remember = (Input::has('remember')) ? true : false;

		  if (Auth::attempt(
		    array(
		      'email' => Input::get('email'), 
		      'password' => Input::get('password')
		    ), $remember
		  )) {
		    return Redirect::to('/');
		  } else {
		    return Redirect::to('login')
		      ->with('messageError', 'Neteisingas el.paštas ir/arba slaptažodis')
		      ->withInput();
		  }	

	}

	public function logout(){
		if(Auth::check()){
			  Auth::logout();
		}
 		return Redirect::route('home');
	}

	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
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
	 * GET /users/{id}/edit
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
	 * PUT /users/{id}
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
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}