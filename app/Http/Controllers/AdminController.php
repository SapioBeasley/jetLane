<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		// installs global error and exception handlers
		\Rollbar::init(array('access_token' => env('ROLLBAR_ACCESS_TOKEN')));
	}

	public function dashboard()
	{
		$users = $this->getAllUsersWithRoles(new \App\User, ['roles']);

		return view('admin.dashboard')->with([
			'users' => $users
		]);
	}

	public function getAllUsersWithRoles($model, $relations = [])
	{
		$users = \CrudHelper::index($model, $relations)->get();

		return $users;
	}

	public function updateRoles(Request $request)
	{
		// dd($request->user_id);
		// dd($request->role);
		$updateRole = \CrudHelper::show(new \App\User, 'id', $request->user_id)->first();

		$updateRole->roles()->sync([$request->role]);

		return redirect()->route('admin')->with('success_message', 'Role for' .  $updateRole['name'] . ' has been updated...');
	}
}
