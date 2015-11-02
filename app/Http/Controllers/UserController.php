<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Mail;

class UserController extends Controller {

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
		$data = array('data'=>\App\User::paginate(5));
		return view('administrator.user')->with($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('user.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User;
		$user->name = Input::get('name');
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->phone = Input::get('phone');
		$user->borndate = Input::get('borndate');
		$user->bornplace = Input::get('bornplace');
		$user->role = Input::get('role');
		$user->gender = Input::get('gender');
		$user->password = bcrypt(Input::get('passwordsend'));
		$user->address = Input::get('address');
		$user->relationship = Input::get('relationship');
		$user->workplace = Input::get('workplace');
		$user->notes = Input::get('notes');
		$user->foto = 'user.png';
		$user->header = 'photo4.jpg';
		if (Auth::user()->role == "Administrator") {
			$user->activated = Input::get('status');
		} else {
			$user->activated = "N";
		}


		$user->save();

		$passwordsend = Input::get('passwordsend');
		foreach ($user as $user) {
		}
		Mail::send('administrator.email',array('name'=>Input::get('name'),'email'=>Input::get('email'),'password'=>$passwordsend,'status'=>Input::get('status'),'url'=>url()),function($messages){
	      $messages->to(Input::get('email'),Input::get('name'))->subject("Registration Data");
	  });
		return redirect('user');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$relationship = DB::select('select *from relationships order by id asc');
		return view('user.profile')->with('relationship', $relationship);
	}

	public function showOther($id)
	{
		$user = \App\User::where('id', $id)->first();

		if(!empty($user)) {
			$data = array('data'=>$user);
			return view('user.otheruser')->with($data);
		} else {
			return redirect(url());
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = array('data' => User::find($id));
		$role = DB::select('select *from roles order by id asc');
		$relationship = DB::select('select *from relationships order by id asc');

		return view('user.edit')->with('data', $data)->with('role', $role)->with('relationship', $relationship);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function updateOther($id)
	{
		$user = User::find($id);
		$user->name = Input::get('name');
		$user->username = Input::get('username');
		$user->bornplace = Input::get('bornplace');
		$user->borndate = Input::get('borndate');
		$user->gender = Input::get('gender');
		$user->phone = Input::get('phone');
		$user->notes = Input::get('notes');
		$user->address = Input::get('address');
		$user->relationship = Input::get('relationship');
		$user->role = Input::get('role');
		$user->workplace = Input::get('workplace');
		$user->email = Input::get('email');
		$user->activated = Input::get('status');
		$user->save();

		return redirect(url('user'));
	}

	public function update($id)
	{
		$user = User::find($id);
		$user->name = Input::get('name');
		$user->username = Input::get('username');
		$user->bornplace = Input::get('bornplace');
		$user->borndate = Input::get('borndate');
		$user->gender = Input::get('gender');
		$user->phone = Input::get('phone');
		$user->notes = Input::get('notes');
		$user->address = Input::get('address');
		$user->relationship = Input::get('relationship');
		$user->role = Input::get('role');
		$user->workplace = Input::get('workplace');
		$user->email = Input::get('email');
		$user->activated = Input::get('status');

		if(Input::hasFile('foto')) {
			$foto = date("YmdHis").uniqid().".".Input::file('foto')->getClientOriginalExtension();
			Input::file('foto')->move(storage_path(), $foto);
			$user->foto = $foto;
		}
		if(Input::hasFile('header')) {
			$header = date("YmdHis").uniqid().".".Input::file('header')->getClientOriginalExtension();
			Input::file('header')->move(storage_path(), $header);
			$user->header = $header;
		}

		$user->save();

		return redirect(url('user/profile/'.Auth::user()->id));
	}

	public function password($id)
	{
		$user = User::find($id);
		if (\Hash::check(Input::get('old'), $user->password)) {
			if(Input::get('confirm') == Input::get('password')) {
				$user->password = bcrypt(Input::get('password'));
				$user->save();
				return redirect(url('user/profile/'.Auth::user()->id));
			} else {
				$errors = "Wrong password Confirmation";
				return redirect(url('user/profile/'.Auth::user()->id))->withErrors($errors)->withInput();
			}
		} else {
			$errors = "Wrong old password";
			return redirect(url('user/profile/'.Auth::user()->id))->withErrors($errors)->withInput();
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteUser($id)
	{
		$user = User::find($id)->delete();
		return redirect(url('user'));
	}

	public function destroy($id)
	{
		$user = User::find($id)->delete();
		return redirect(url('auth/logout'));;
	}

}
