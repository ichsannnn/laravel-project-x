<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Http\Request;
use App\Project;


class ProjectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		if (\Auth::user()->activated == "N") {
			return redirect(url('auth/logout'));
		}
		$project = DB::select('select * from projects where status != "N" order by id desc');
		$user = DB::select('select * from users');
		return view('project.index')->with('project', $project)->with('user', $user);
	}

	public function all()
	{
		$data = array('data'=>\App\Project::paginate(5));
		return view('project.all')->with($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$head				= DB::select('select * from users where role = "Head Developer" && activated = "Y"');
		$developer	= DB::select('select * from users where role = "Developer" && activated = "Y"');
		return view('project.add')->with('head', $head)->with('developer', $developer);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$project = New \App\Project;
		$project->userid = '1';
		$project->name = Input::get('name');
		$project->head = Input::get('head');
		$project->client = Input::get('client');
		$project->description = Input::get('description');
		$project->budget = Input::get('budget');
		$project->status = Input::get('status');
		$developer = Input::get('developer');
		if (Input::get('developer') == "") {

		} else {
			$project->developer = implode(",", $developer);
		}

		$project->save();
		return redirect('project');
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
		$data				= array('data' => \App\Project::find($id));
		$head				= DB::select('select * from users where role = "Head Developer" && activated = "Y"');
		$developer	= DB::select('select * from users where role = "Developer" && activated = "Y"');
		$status = [
			'Active',
			'Complete',
			'Deadline'
		];
		$client	= DB::select('select * from projects order by client');
		$complete = [
			'0',
			'5',
			'10',
			'15',
			'20',
			'25',
			'30',
			'35',
			'40',
			'45',
			'50',
			'55',
			'60',
			'65',
			'70',
			'75',
			'80',
			'85',
			'90',
			'95'
		];

		return view('project.edit')->with('data', $data)->with('head', $head)->with('developer', $developer)->with('status', $status)->with('client', $client)->with('complete', $complete);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$project = \App\Project::find($id);
		$project->name = Input::get('name');
		$project->head = Input::get('head');
		$project->client = Input::get('client');
		$project->description = Input::get('description');
		$project->budget = Input::get('budget');
		$project->status = Input::get('status');
		$project->complete = Input::get('complete');
		$developer = Input::get('developer');
		if (Input::get('developer') == "") {

		} else {
			$project->developer = implode(",", $developer);
		}

		$project->save();
		return redirect('project');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = \App\Project::find($id)->delete();
		return redirect(url('project/show'));;
	}

}
