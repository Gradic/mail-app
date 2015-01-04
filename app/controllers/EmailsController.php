<?php

class EmailsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /emails
	 *
	 * @return Response
	 */
	public function index()
	{
		$all = Email::paginate(15);
		return View::make('mails.all', array('all_mails' => $all));
	}


	/**
	 * Show the form for creating a new resource.
	 * GET /emails/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('mails.create', array('meta_title' => 'Pridėti el. paštą'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /emails
	 *
	 * @return Response
	 */
	public function store()
	{
			$rules = array(
			  'email' => 'required|email|unique:emails',
			);
		$messages = array(
			'email.required' => 'El. paštas privalomas.',
			'email.email' => 'Netinkamas el. pašto adresas.',
			'email.unique' => 'Toks el. pašto adresas jau naudojamas.');
		$validator = Validator::make(Input::all(), $rules, $messages);
		if ($validator->fails()) {
		  return Redirect::to('email/create')->withErrors($validator)->withInput();
		} else {
			$user = new Email;
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->save();
			  return Redirect::to('email/create');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /emails/{id}
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
	 * GET /emails/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mail = Email::find($id);
		return View::make('mails.edit', array('mail' => $mail));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /emails/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			  'email' => 'required|email',
			);
		$messages = array(
			'email.required' => 'El. paštas privalomas.',
			'email.email' => 'Netinkamas el. pašto adresas.');
		$validator = Validator::make(Input::all(), $rules, $messages);
		if ($validator->fails()) {
		  return Redirect::to('email/'.$id.'/edit')->withErrors($validator)->withInput();
		} else {
			$mail = Email::find($id);
			$mail->email = Input::get('email');
			$mail->name = Input::get('name');
			$mail->save();
			return Redirect::to('email');
		}
		
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /emails/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Email::find($id)->delete();
		return Redirect::to('email');
	}

}