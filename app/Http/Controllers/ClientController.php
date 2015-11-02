<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Http\Request;

class ClientController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	public function viewUser()
	{
		$user = \DB::select('select * from users order by name asc');
		return view('client.user')->with('user', $user);
	}

	public function viewProject()
	{
		$project = \DB::select('select * from projects where status != "N" order by id desc');
		return view('client.project')->with('project', $project);
	}

	public function viewAbout()
	{
		return view('client.about');
	}

	public function searchProject()
	{
		$search = Input::get('search');
		$project = \DB::select('select *from projects where name like "%'.$search.'%"');

		return view('client.search')->with('project', $project);
	}

	public function searchUser()
	{
		$search = Input::get('search');
		$user = \DB::select('select *from users where name like "%'.$search.'%"');

		return view('client.search2')->with('user', $user);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$client	= DB::select('select * from projects order by client');
		return view('client.add')->with('client', $client);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$project = new \App\Project;
		$project->name = Input::get('name');
		$project->client = Input::get('client');
		$project->description = Input::get('description');
		$project->budget = Input::get('budget');
		$project->status = 'N';

		$project->save();
		return redirect(url('client/success'));
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

}
